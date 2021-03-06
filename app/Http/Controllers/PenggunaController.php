<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Iklan;
use App\JK_kumuplan_perkhidmatan;
use App\JK_taraf_jawatan;
use App\Iklan_jawatan;
use App\JK_Agama;
use App\JK_Keturunan;
use App\JK_Negeri;
use App\JK_Taraf;
use App\JK_Gambar_Passport;

use App\JK_MaklumatDiri;
use App\JK_Pengalaman;
use App\JK_Pengesahan;

use App\JK_Pengajian_Tinggi;
use App\JK_Matrikulasi;
use App\JK_PMR;
use App\JK_SPM;
use App\JK_SPMU;
use App\JK_STAM;
use App\JK_STPA;
use App\JK_SVM;
use App\JK_SKM;

use App\KeputusanPMR;

use App\User;
use Auth;
use Session;
use Alert;
use DB;

use PDF;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PenggunaController extends Controller
{
    public function iklan()
    {
        // $gambardp = $this->gambardp();

        $tarikh_kini = \Carbon\Carbon::now()->format('Y-m-d');
        // $tarikh_mula =\Carbon\Carbon::parse($ikln->tarikh_mula)->format('Y-m-d');
        // $tarikh_tamat =\Carbon\Carbon::parse($ikln->tarikh_tamat)->format('Y-m-d');

        $syarat = DB::table('senarai-syarat-jawatan')->get();

        $iklan = Iklan::where('tarikh_mula', '<=', $tarikh_kini)
            ->where('tarikh_tamat', '>=', $tarikh_kini)
            ->where('jenis', 'TERBUKA')
            ->get();

        return view('pengguna.iklan', compact('iklan', 'syarat'));
    }

    public function maklumatdiri()
    {
        $bil = JK_MaklumatDiri::where('user_id', Auth::user()->id)->count();

        $negeri = JK_Negeri::all();
        $agama = JK_Agama::all();
        $keturunan = JK_Keturunan::all();
        $taraf = JK_Taraf::all();

        $user = User::where('id', Auth::user()->id)->first();
        $detail = JK_MaklumatDiri::where('user_id', Auth::user()->id)->first();

        if ($bil > 0) {
            return view('pengguna.maklumat-diri-kemaskini', compact('user', 'detail', 'negeri', 'agama', 'keturunan', 'taraf'));
        } else {
            return view('pengguna.maklumat-diri', compact('user', 'detail', 'negeri', 'agama', 'keturunan', 'taraf'));
        }
    }

    public function pengalaman()
    {
        $bil_pengalaman = JK_Pengalaman::where('user_id', Auth::user()->id)->count();

        $pengalaman = JK_Pengalaman::where('user_id', Auth::user()->id)
            ->orderBy('mula_kerja', 'desc')
            ->get();

        return view('pengguna.pengalaman', compact('pengalaman', 'bil_pengalaman'));
    }

    public function pengesahan()
    {
        return view('pengguna.pengesahan');
    }

    public function pt3()
    {
        $bil = JK_PMR::where('user_id', Auth::user()->id)->count();

        $pmr = JK_PMR::where('user_id', Auth::user()->id)->first();

        $k_pmr = KeputusanPMR::where('id_pmr', $pmr->id)->get();

        // dd($k_pmr);

        $mtpt3 = $this->subjekPt3();
        $gredpt3 = $this->gredPt3();

        if ($bil > 0) {
             return view('pengguna.akademik.kemaskini.srp-pmr-pt3', compact('mtpt3','gredpt3','pmr', 'k_pmr'));
        } else {
             return view('pengguna.akademik.srp-pmr-pt3', compact('mtpt3','gredpt3'));
        }
        
    }
    public function spm()
    {
        $mtspm = $this->subjekspm();
        $gredspm = $this->gredSpm();
        
        return view('pengguna.akademik.spm-spmv', compact('mtspm','gredspm'));
    }
    public function spmu()
    {
        $gredspm = $this->gredSpm();
        $mtspm = $this->subjekspm();

        return view('pengguna.akademik.spm-ulangan', compact('mtspm', 'gredspm'));
    }
    public function svm()
    {
        $listSijil = $this->sijilSvm();
        $gredbm = $this->gredSpm();

        $bil = JK_SVM::where('user_id', Auth::user()->id)->count();

        $svm = JK_SVM::where('user_id', Auth::user()->id)->first();

        if ($bil > 0) {
            return view('pengguna.akademik.svm-kemaskini', compact('svm', 'listSijil', 'gredbm'));
        } else {
            return view('pengguna.akademik.svm', compact('listSijil', 'gredbm'));
        }

        // return view('pengguna.akademik.svm', compact('listSijil', 'gredbm'));
    }
    public function skm()
    {
        $listSijil = $this->sijilSkm();

        $skm = JK_SKM::select('jk_skm.*', 'jk_kelulusan.diskripsi')
        ->join('jk_kelulusan', 'jk_kelulusan.id_kelulusan', '=', 'jk_skm.namaSijil')
        ->where('user_id', Auth::user()->id)
        ->orderBy('tahunSijil', 'desc')
        ->get();
        
        return view('pengguna.akademik.skm', compact('listSijil', 'skm'));
    }
    public function stpm()
    {
        $mtstpm = $this->subjekstpm();
        $gredstpm = $this->gredStpm();

        return view('pengguna.akademik.stpm', compact('mtstpm','gredstpm'));
    }
    public function stam()
    {
        $mtstam = $this->subjekstam();
        $gredstam = $this->gredStam();

        return view('pengguna.akademik.stam', compact('mtstam', 'gredstam'));
    }
    public function matrikulasi()
    {
        $bil = JK_Matrikulasi::where('user_id', Auth::user()->id)->count();

        $matrix = JK_Matrikulasi::where('user_id', Auth::user()->id)->first();

        if ($bil > 0) {
            return view('pengguna.akademik.matrikulasi-kemaskini', compact('matrix'));
        } else {
            return view('pengguna.akademik.matrikulasi', compact('matrix'));
        }
    }
    public function ipt()
    {
        $peringkatIpt = $this->peringkatIpt();
        $pengkhususan = $this->pengkhususan();
        $institusi = $this->institusi();

        return view('pengguna.akademik.pengajian-tinggi', compact('peringkatIpt', 'pengkhususan', 'institusi'));
    }

    public function crop(Request $req)
    {
        // if ($req->hasFile('avatarFile')) {
            $dest = 'public/gambarPemohon/'.Auth::user()->id.'/';
            // $dest = 'gambarPemohon/'.Auth::user()->id.'/';
            $file = $req->file('avatarFile');
            $extension = $file->getClientOriginalExtension();
            $new_image_name = 'DP'.date('YmdHis').uniqid().'.jpg';
            // $new_image_name = 'DP'.date('YmdHis').uniqid().'.'.$extension.'';

            $upload_success = $file->storeAs($dest, $new_image_name);

            if (!$upload_success) {
                return response()->json(['status'=>0, 'msg'=>'Muat naik tidak berjaya']);
            }else {

                $checkgambar = JK_Gambar_Passport::where('user_id', Auth::user()->id)->count();
                
                if ($checkgambar > 0) {
                    //padam imej lama
                    $gambarlama = JK_Gambar_Passport::where('user_id', Auth::user()->id)->first();
                    $gambarpemohon = $gambarlama->path_gambar;
                    
                    if ($gambarpemohon != '') {
                        Storage::delete($gambarlama->path_gambar);
                    }
                    //kemaskini gambar baru dalam DB
                    JK_Gambar_Passport::where('user_id', Auth::user()->id)->update([
                        'nama_gambar' => $new_image_name,
                        'extension_gambar' => $extension,
                        'path_gambar' => $dest.$new_image_name
                    ]);
                } else {
                    JK_Gambar_Passport::where('user_id', Auth::user()->id)->insert([
                        'user_id' => Auth::user()->id,
                        'nama_gambar' => $new_image_name,
                        'extension_gambar' => $extension,
                        'path_gambar' => $dest.$new_image_name
                    ]);
                }
                return response()->json(['status'=>1, 'msg'=>'Gambar telah berjaya dikemaskini', 'name'=>$new_image_name]);
            }
        // } else {
        //     return 'neh';
        // }
    }

    public function tambahmaklumatdiri(Request $req, $id)
    {
        User::where('id', $id)->update([
            'nama' => $req->nama,
            'ic' => $req->ic,
            'email' => $req->email,
        ]);


        $data = new JK_MaklumatDiri();
        $data->user_id = $id;
        $data->negeri_lahir = $req->negeri_lahir;
        $data->negeri_lahir_bapa = $req->negeri_lahir_bapa;
        $data->negeri_lahir_ibu = $req->negeri_lahir_ibu;
        $data->jantina = $req->jantina;
        $data->hari_lahir = $req->hari_lahir;
        $data->bulan_lahir = $req->bulan_lahir;
        $data->tahun_lahir = $req->tahun_lahir;
        $data->alamat = $req->alamat;
        $data->alamat2 = $req->alamat2;
        $data->poskod = $req->poskod;
        $data->daerah = $req->daerah;
        $data->negeri = $req->negeri;
        $data->notel = $req->notel;
        $data->notel2 = $req->notel2;
        $data->agama = $req->agama;
        $data->lain_agama = $req->lain_agama;
        $data->keturunan = $req->keturunan;
        $data->lain_keturunan = $req->lain_keturunan;
        $data->taraf_kahwin = $req->taraf_kahwin;
        $data->save();

        // Alert::success('Berjaya', 'Maklumat disimpan');
        // Toast('Maklumat disimpan', 'success')->position('top-end');
        Session::flash('message', 'Maklumat Disimpan'); 
        Session::flash('alert-class', 'success'); 
        return back();
    }

    public function kemaskinimaklumatdiri(Request $req, $id)
    {
        User::where('id', $id)->update([
            'nama' => $req->nama,
            'ic' => $req->ic,
            'email' => $req->email,
        ]);

        JK_MaklumatDiri::where('user_id', $id)->update([
            'negeri_lahir' => $req->negeri_lahir,
            'negeri_lahir_bapa' => $req->negeri_lahir_bapa,
            'negeri_lahir_ibu' => $req->negeri_lahir_ibu,
            'jantina' => $req->jantina,
            'hari_lahir' => $req->hari_lahir,
            'bulan_lahir' => $req->bulan_lahir,
            'tahun_lahir' => $req->tahun_lahir,
            'alamat' => $req->alamat,
            'alamat2' => $req->alamat2,
            'poskod' => $req->poskod,
            'daerah' => $req->daerah,
            'negeri' => $req->negeri,
            'notel' => $req->notel,
            'notel2' => $req->notel2,
            'agama' => $req->agama,
            'lain_agama' => $req->lain_agama,
            'keturunan' => $req->keturunan,
            'lain_keturunan' => $req->lain_keturunan,
            'taraf_kahwin' => $req->taraf_kahwin,
        ]);

        // Alert::success('Berjaya', 'Maklumat disimpan');
        // Toast('Maklumat disimpan', 'success')->position('top-end');
        Session::flash('message', 'Maklumat Disimpan'); 
        Session::flash('alert-class', 'success'); 
        return back();
    }

    public function tambahPengalaman(Request $req)
    {
        $data = new JK_Pengalaman();
        $data->user_id = Auth::user()->id;
        $data->nama_jawatan = $req->nama_jawatan;
        $data->majikan = $req->majikan;
        $data->alamat_majikan = $req->alamat_majikan;
        $data->taraf_jawatan = $req->taraf_jawatan;
        $data->mula_kerja = $req->mula_kerja;
        $data->akhir_kerja = $req->akhir_kerja;
        $data->tugas = $req->tugas;
        $data->save();

        // Alert::success('Berjaya', 'Maklumat dikemaskini');
        // Toast('Maklumat Ditambah', 'success')->position('top-end');
        Session::flash('message', 'Maklumat Ditambah'); 
        Session::flash('alert-class', 'success'); 
        return back();
    }

    public function kemaskiniPengalaman(Request $req, $id)
    {
        JK_Pengalaman::where('id', $id)->update([
            'nama_jawatan' => $req->nama_jawatan,
            'majikan' => $req->majikan,
            'alamat_majikan' => $req->alamat_majikan,
            'taraf_jawatan' => $req->taraf_jawatan,
            'mula_kerja' => $req->mula_kerja,
            'akhir_kerja' => $req->akhir_kerja,
            'tugas' => $req->tugas,
        ]);

        //  Toast('Maklumat Dikemaskini', 'success')->position('top-end');
        Session::flash('message', 'Maklumat Dikemaskini'); 
        Session::flash('alert-class', 'success'); 
        return back();
    }

    public function padamPengalaman($id)
    {
        JK_Pengalaman::where('id', $id)->delete();

        // Toast('Maklumat Dipadam', 'success')->position('top-end');
        Session::flash('message', 'Maklumat Dipadam'); 
        Session::flash('alert-class', 'error'); 
        return back();
    }

    public function gambardp()
    {
        $gambardp = JK_Gambar_Passport::where('user_id', Auth::user()->id)->first();

        return $gambardp;
    }

    public function simpanpmr(Request $req)
    { 
        // dd($req->all());

        $id_exam = JK_PMR::insertGetId([
            'user_id' => Auth::user()->id,
            'jenis' => $req->jenis,
            'tahun' => $req->tahun,
            'created_at' => \Carbon\carbon::now(),
        ]);
         
       
        for ($i = 0; $i < count($req->addMoreInputFields); $i++) {

            $data = new KeputusanPMR();
            $data->id_pmr = $id_exam;
            $data->matapelajaran = $req->input('addMoreInputFields.' . $i . '.matapelajaran');
            $data->gred = $req->input('addMoreInputFields.' . $i . '.gred');
            $data->save();
        }

        Session::flash('message', 'Maklumat Disimpan'); 
        Session::flash('alert-class', 'success'); 

        return back();
    }

    public function kemaskinipmr(Request $req)
    {
        $id = Auth::user()->id;
        
        $id_pmr = JK_PMR::where('id', $id)->first();

        JK_PMR::where('user_id', $id)->update([
            'jenis' => $req->jenis,
            'tahun' => $req->tahun,
        ]);

        for ($i = 0; $i < count($req->row); $i++) {

            $id_keputusan = $req->input('row.' . $i . '.id_keputusan');

            if (empty($id_keputusan)) {
                $data = new KeputusanPMR();
                $data->id_pmr = $id;
                $data->matapelajaran = $req->input('row.' . $i . '.matapelajaran');
                $data->gred = $req->input('row.' . $i . '.gred');
                $data->save();
            } else {
                KeputusanPMR::where('id', $id_keputusan)->update([
                    'matapelajaran' => $req->input('row.' . $i . '.matapelajaran'),
                    'gred' => $req->input('row.' . $i . '.gred'),
                ]);
            }
        }

        Session::flash('message', 'Maklumat Dikemaskini'); 
        Session::flash('alert-class', 'success'); 
        return back();
    }

    public function simpanmatrikulasi(Request $req)
    {
        $bil = JK_Matrikulasi::where('user_id', Auth::user()->id)->count();

        $data = new JK_Matrikulasi();
        $data->user_id = Auth::user()->id;
        $data->nama_kolej = $req->nama_kolej;
        $data->bidang = $req->bidang;
        $data->cgpa = $req->cgpa;
        $data->tahun = $req->tahun;
        $data->save();

        // Toast('Maklumat Disimpan', 'success')->position('top-end');
        Session::flash('message', 'Maklumat Disimpan'); 
        Session::flash('alert-class', 'success'); 

        return back();
    }

    public function kemaskinimatrikulasi(Request $req)
    {
        JK_Matrikulasi::where('user_id', Auth::user()->id)->update([
            'nama_kolej' => $req->nama_kolej,
            'bidang' => $req->bidang,
            'cgpa' => $req->cgpa,
            'tahun' => $req->tahun,
        ]);

        // Toast('Maklumat Dikemaskini', 'success')->position('top-end');
        Session::flash('message', 'Maklumat Dikemaskini'); 
        Session::flash('alert-class', 'success'); 

        return back();
    }

    public function simpansvm(Request $req)
    {
        $data = new JK_SVM();
        $data->user_id = Auth::user()->id;
        $data->namaSijil = $req->namaSijil;
        $data->tahunSijil = $req->tahunSijil;
        $data->bm_svm = $req->bm_svm;
        $data->pngka = $req->pngka;
        $data->pngkv = $req->pngkv;
        $data->save();

        // Toast('Maklumat Disimpan', 'success')->position('top-end');
        Session::flash('message', 'Maklumat Disimpan'); 
        Session::flash('alert-class', 'success'); 
        return back();
    }

    public function kemaskinisvm(Request $req)
    {
        $id = $req->id;

        JK_SVM::where('id', $id)->update([
            'namaSijil' => $req->namaSijil,
            'tahunSijil' => $req->tahunSijil,
            'bm_svm' => $req->bm_svm,
            'pngka' => $req->pngka,
            'pngkv' => $req->pngkv,
        ]);

        // Toast('Maklumat Dikemaskini', 'success')->position('top-end');
        Session::flash('message', 'Maklumat Dikemaskini'); 
        Session::flash('alert-class', 'success'); 
        return back();
    }

    public function simpanskm(Request $req)
    {
        $data = new JK_SKM();
        $data->user_id = Auth::user()->id;
        $data->namaSijil = $req->namaSijil;
        $data->tahunSijil = $req->tahunSijil;
        $data->save();

        // Toast('Maklumat ditambah', 'success')->position('top-end');
        Session::flash('message', 'Maklumat ditambah'); 
        Session::flash('alert-class', 'success'); 
        return back();
    }

    public function padamskm(Request $req)
    {
        JK_SKM::where('id', $req->id)->delete();

        // Toast('Maklumat Dipadam', 'success')->position('top-end');
        Session::flash('message', 'Maklumat Dipadam'); 
        Session::flash('alert-class', 'error'); 
        return back();
    }

    public function simpanipt(Request $req)
    {
        JK_Pengajian_Tinggi::insert([
            'user_id' => Auth::user()->id,
            'kelulusan' => $req->peringkat,
            'institusi' => $req->institusi,
            'cgpa' => $req->cgpa,
            'tahun_graduasi' => $req->tahunGrad,
            'nama_skrol' => $req->namaSijil,
            'bidang_pengkhususan' => $req->pengkhususan,
            'tarikh_senat' => $req->tarikhSenat,
        ]);

        // Toast('Maklumat Disimpan', 'success')->position('top-end');
        Session::flash('message', 'Maklumat Disimpan'); 
        Session::flash('alert-class', 'success'); 
        return back();
    }

    public function subjekPt3()
    {
        $subjPt3 = DB::table('jk_senarai_matapelajaran_pt3')->get();

        return $subjPt3;
    }

    public function subjekspm()
    {
        $subjSpm = DB::table('jk_senarai_matapelajaran_spm')->get();

        return $subjSpm;
    }

    public function peringkatIpt()
    {
        $peringkatIpt = DB::table('jk_peringkat_ipt')->get();

        return $peringkatIpt;
    }

    public function subjekstam()
    {
        $subjStam = DB::table('jk_senarai_matapelajaran_stam')->get();

        return $subjStam;
    }

    public function subjekstpm()
    {
        $subjStpm = DB::table('jk_senarai_matapelajaran_stpm')->get();

        return $subjStpm;
    }
    
    public function sijilSvm()
    {
        $svm = DB::table('jk_kelulusan')
        ->where('diskripsi', 'LIKE', '%SIJ VOKASIONAL MSIA%')
        ->get();
 
        return $svm;
    }

    public function sijilSkm()
    {
        $skm = DB::table('jk_kelulusan')
        ->where('diskripsi', 'LIKE', '%SIJ SKM%')
        ->get();
 
        return $skm;
    }

    public function gredPt3()
    {
        $gredpt3 = DB::table('jk_senarai_gred_pt3')->get();

        return $gredpt3;
    }

    public function gredSpm()
    {
        $gredspm = DB::table('jk_senarai_gred_spm')->get();

        return $gredspm;
    }

    public function gredStam()
    {
        $gredstam = DB::table('jk_senarai_gred_stam')->get();

        return $gredstam;
    }

    public function gredStpm()
    {
        $gredstpm = DB::table('jk_senarai_gred_stpm')->get();

        return $gredstpm;
    }

    public function pengkhususan()
    {
        $pengkhususan = DB::table('jk_pengkhususan')->get();

        return $pengkhususan;
    
    }

    public function institusi()
    {
        $institusi = DB::table('jk_institusi')->orderBy('kod', 'asc')->get();

        return $institusi;
    }
}
