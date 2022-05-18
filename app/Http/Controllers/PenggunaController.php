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

use App\User;
use Auth;
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

        return view('pengguna.iklan', compact('iklan', 'syarat', 'gambardp'));
    }

    public function maklumatdiri()
    {

        $negeri = JK_Negeri::all();
        $agama = JK_Agama::all();
        $keturunan = JK_Keturunan::all();
        $taraf = JK_Taraf::all();

        $user = User::where('id', Auth::user()->id)->first();
        $detail = JK_MaklumatDiri::where('user_id', Auth::user()->id)->first();

        return view('pengguna.maklumat-diri', compact('user', 'detail', 'negeri', 'agama', 'keturunan', 'taraf'));
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
        return view('pengguna.akademik.srp-pmr-pt3');
    }
    public function spm()
    {
        return view('pengguna.akademik.spm-spmv');
    }
    public function spmu()
    {
        return view('pengguna.akademik.spm-ulangan');
    }
    public function svm()
    {
        return view('pengguna.akademik.svm');
    }
    public function skm()
    {
        return view('pengguna.akademik.skm');
    }
    public function stpm()
    {
        return view('pengguna.akademik.stpm');
    }
    public function stam()
    {
        return view('pengguna.akademik.stam');
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
        return view('pengguna.akademik.pengajian-tinggi');
    }

    public function kemaskinimaklumatdiri(Request $req, $id)
    {
        User::where('id', $id)->update([
            'nama' => $req->nama,
            'ic' => $req->ic,
            'email' => $req->email,
        ]);

        $bil = JK_MaklumatDiri::where('user_id', $id)->count();

        if ($bil == 0) {
            // dd($bil);
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
        } elseif ($bil == 1) {
            // dd($bil);

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
        }

        Alert::success('Berjaya', 'Maklumat dikemaskini');
        // Toast('Maklumat Dikemaskini', 'success')->position('top-end');
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
        Toast('Maklumat Ditambah', 'success')->position('top-end');
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

        // Alert::success('Berjaya', 'Maklumat dikemaskini');
        Toast('Maklumat Dikemaskini', 'success')->position('top-end');
        return back();
    }

    public function padamPengalaman($id)
    {
        JK_Pengalaman::where('id', $id)->delete();

        Toast('Maklumat Dipadam', 'success')->position('top-end');
        return back();
    }

    public function gambardp()
    {
        $gambardp = JK_Gambar_Passport::where('user_id', Auth::user()->id)
        ->get();

        return $gambardp;
    }

    public function simpanpmr(Request $req)
    {
        $data = new JK_PMR;
        $data->user_id = Auth::user()->id;
        $data->jenis = $req->jenis;
        $data->tahun = $req->tahun;
        $data->save();

        Toast('Maklumat Disimpan', 'success')->position('top-end');
        return back();
    }

    public function simpanmatrikulasi(Request $req)
    {
        $bil = JK_Matrikulasi::where('user_id', Auth::user()->id)->count();

            $data = new JK_Matrikulasi;
            $data->user_id = Auth::user()->id;
            $data->nama_kolej = $req->nama_kolej;
            $data->bidang = $req->bidang;
            $data->cgpa = $req->cgpa;
            $data->tahun = $req->tahun;
            $data->save();
      
        Toast('Maklumat Disimpan', 'success')->position('top-end');
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

        Toast('Maklumat Dikemaskini', 'success')->position('top-end');
        return back();
    }
}
