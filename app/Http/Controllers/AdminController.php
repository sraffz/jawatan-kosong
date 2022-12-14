<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Iklan;
use App\Admin;
use App\JK_kumuplan_perkhidmatan;
use App\JK_taraf_jawatan;
use App\JK_JenisPanggilan;
use App\Iklan_jawatan;
use App\Admin_log;
use App\User;

use App\JK_MaklumatDiri;
use App\JK_MaklumatTambahan;
use App\JK_Pengalaman;

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

use App\Exports\ExportPemohon;
use Maatwebsite\Excel\Facades\Excel;

use Auth;
use Hash;
use Alert;
use DB;
use Dompdf\Dompdf;
use Carbon\Carbon;
use App\Rules\MatchOldPassword;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Response;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarikh_kini = \Carbon\Carbon::now()->format('Y-m-d');
        
        $bil_iklan = Iklan::where('tarikh_mula','<=',$tarikh_kini)
        ->where('tarikh_tamat', '>=', $tarikh_kini)
        ->where('publish', 1)
        ->count();

        return view('admin', compact('bil_iklan'));
    }

    public function profil()
    {
        return view('admin.profil');
    }

    public function iklan()
    {

        $iklan = Iklan::all();
        
        $iklan_last = Iklan::orderBy('created_at', 'desc')->first();

        $syarat = DB::table('senarai-syarat-jawatan')->get();

        $tarikh_kini = \Carbon\Carbon::now()->format('Y-m-d');

        $bil_terbuka = Iklan::where('tarikh_mula','<=',$tarikh_kini)
        ->where('tarikh_tamat', '>=', $tarikh_kini)
        ->where('jenis', "TERBUKA")
        ->where('publish', 1)
        ->count();

        $bil_tutup = Iklan::where('tarikh_mula','<=',$tarikh_kini)
        ->where('tarikh_tamat', '>=', $tarikh_kini)
        ->where('jenis', "TERTUTUP")
        ->where('publish', 1)
        ->count();

        $jumlah = DB::table('jumlah_pemohonan_iklan')->get();

        // dd($jumlah);
        // dd($bil_terbuka, $bil_tutup);
        return view('admin.iklan', compact('iklan', 'syarat', 'bil_terbuka', 'bil_tutup', 'iklan_last', 'jumlah'));
    }

    public function tetapan()
    {
        return view('admin.tetapan');
    }

    public function tukarKataLaluan(Request $req)
    {
            $req->validate([
                'passTerkini' => ['required', new MatchOldPassword()],
                'passBaru' => ['required'],
                'passBaruSah' => ['same:passBaru'],
            ]);

            $current = $req->passTerkini;
            $old = Auth::user()->password;

            // dd($current, $old);
            if (Hash::check($current, $old)){
                Admin::where('id', Auth::user()->id)
                ->update([
                    'password' => Hash::make($req->passBaru)
                ]);
            } else {
                Alert::error('Ralat', 'Kata laluan terkini tidak sama dengan rekod kami.');
                return back();
            }

        // toast('Kata laluan berjaya ditukar', 'success')->position('top-end');
        Alert::success('Berjaya', 'Kata laluan berjaya ditukar');
        return back();
    }

    public function tukarkatalaluanSama(Request $request)
    {
        $request->validate([
            'password' => ['required', 'min:8'],
            'confirmpassword' => ['same:password'],
        ]);

        Admin::where('id', Auth::user()->id)->update([
            'password' => Hash::make($request->password),
        ]);

        // flash('Kata laluan telah ditukar.')->success();
        Alert::Success('Makluman', 'Kata laluan telah ditukar.');

        return back();
    }

    public function kemaskiniAdmin(Request $req)
    {
        Admin::where('id', Auth::user()->id)
            ->update([
                'nama' => $req->nama,
                'ic' => $req->ic,
                'email' => $req->email,
            ]);
            
            toast('Maklumat dikemaskini', 'success')->position('top-end');
            // Alert::success('Berjaya', 'Kata laluan berjaya ditukar');
        return back();
    }

    public function bukaiklan(Request $req)
    {
        // dd($req->gaji_min);

        $bil = Iklan::where('tahun', now()->year)->count();

        $random = Str::random(5);

        $id = Iklan::insertGetId([
            'tahun' => $req->tahun,
            'bil' => $req->bil,
            'tarikh_mula' => $req->tarikhmula,
            'tarikh_tamat' => $req->tarikhtamat,
            'jenis' => $req->jenisiklan,
            'gaji_min' => $req->gaji_min,
            'pautan' => $req->pautan,
            'publish' => $req->publish,
            'id_pencipta' => Auth::user()->id,
            'url' => $random,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        // $kk = new Iklan;
        // $kk->tahun = $req->tahun;
        // $kk->bil = $req->bil;
        // $kk->tarikh_mula = $req->tarikhmula;
        // $kk->tarikh_tamat = $req->tarikhtamat;
        // $kk->jenis = $req->jenisiklan;
        // $kk->pautan = $req->pautan;
        // $kk->id_pencipta = Auth::user()->id;
        // $kk->url = $random;
        // $kk->save();
         
        $d = $random;

        Admin_log::insert([
            'admin_id' => Auth::user()->id,
            'proses' => 'Buka Iklan bil '.$req->bil.' '.$req->tahun.'',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        Alert::success('Berjaya', 'Iklan baru berjaya ditambah');
        return redirect('/admin/kemaskini-iklan/' . $d . '');
    }
    
    public function padamiklan(Request $req)
    {
        $id = $req->id;

        $listjawatan = Iklan_jawatan::where('id_iklan', $id)->get();

        foreach ($listjawatan as $lj) {
            Storage::delete($lj->lokasi_fail);

            Iklan_jawatan::where('id', $lj->id)->delete();
        }

        $data = Iklan::where('id', $id)->first();
   
        Admin_log::insert([
            'admin_id' => Auth::user()->id,
            'proses' => 'Padam Iklan bil '.$data->bil.' '.$data->tahun.'',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        
        Iklan::where('id', $id)->delete();

        Alert::success('Berjaya', 'Iklan telah dipadam');
        return back();
    }

    public function kemaskiniiklan($id)
    {
        $iklan = Iklan::where('url', $id)->first();
        $taraf = JK_taraf_jawatan::all();
        $kump = JK_kumuplan_perkhidmatan::all();

        $syarat = DB::table('senarai-syarat-jawatan')->select('*', \DB::raw("SUBSTR(gred, 3, 2) as sort_gred"))
            ->where('id_iklan', $iklan->id)
            ->orderBy('sort_gred', 'asc')
            ->get();
        
        return view('admin.kemaskini-iklan', compact('iklan', 'syarat', 'taraf', 'kump'));
    }

    public function paparanIklan($url)
    {
        $ikln = Iklan::where('url', $url)
        ->first();

        $syarat = DB::table('senarai-syarat-jawatan')->get();

        return view('admin.preview-iklan', compact('ikln', 'syarat'));
    }

    public function kemaskiniiklann(Request $req, $id)
    {
        $id = Iklan::where('id', $id)->update([
            'tahun' =>$req->tahun,
            'bil' => $req->bil,
            'tarikh_mula' => Carbon::parse($req->tarikhmula)->format('Y-m-d'),
            'tarikh_tamat' => Carbon::parse($req->tarikhtamat)->format('Y-m-d'),
            'jenis' => $req->jenisiklan,
            'gaji_min' => $req->gaji_min,
            'publish' => $req->publish,
            'pautan' => $req->pautan,
            'id_pencipta' => Auth::user()->id,
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        Toast('Telah Dikemaskini', 'success')->position('top-end');

        return back();
    }

    public function tambahjawatan(Request $req)
    {
        $id = $req->id;

        $iklan = Iklan::where('id', $id)->first();

        // return dd($iklan->tahun, $iklan->bil);
        if ($req->hasFile('syarat')) {
            // $allowedfileExtension=['pdf','jpg','png','docx'];
            $file = $req->file('syarat');
            $filename = $file->hashName();
            // $filename = $file->getClientOriginalName();
            $extension = $file->extension();

            // return dd($filename, $extension);
            if ($extension == 'pdf') {
                // check folder for 'current year', if not exist, create one
                $storagePath = $iklan->tahun . '/' . $iklan->bil;
                $storagePathSave = 'public/' . $iklan->tahun . '/' . $iklan->bil;
                $filePath = str_replace(base_path() . '/', '', $storagePath) . '/' . $filename;
                // return dd($filePath);
                $upload_success = $file->storeAs($storagePath, $filename);

                if ($upload_success) {
                    $data = new Iklan_jawatan();
                    $data->id_iklan = $id;
                    $data->nama_jawatan = $req->jawatan;
                    $data->gred = $req->gred;
                    $data->gajiMin = $req->gajiMin;
                    $data->kump_perkhidmatan = $req->kump;
                    $data->taraf_jawatan = $req->taraf;
                    $data->nama_fail = $filename;
                    $data->format = $extension;
                    $data->lokasi_fail = $filePath;
                    $data->save();

                    Alert::success('Berjaya', 'Jawatan Berjaya Ditambah');
                    return back();
                } else {
                    Alert::error('Tidak Berjaya', 'Muat naik tidak berjaya');
                    return back();
                }
            } else {
                // echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
                Alert::error('Tidak Berjaya', 'Fail berformat PDF sahaja boleh di muat naik');
                return back();
            }
            Alert::error('Tidak Berjaya', 'Tiada Fail');
            return back();
        }
        else{
            Alert::error('Tidak Berjaya', '');
            return back();
        }
    }

    public function dlsyarat($id)
    {   
        $f = Iklan_jawatan::where('jk_iklan_jawatan.id', $id)
            ->join('jk_iklan', 'jk_iklan.id', '=', 'jk_iklan_jawatan.id_iklan')
            ->first();

        $nama_fail = 'SUK-JK_' . $f->tahun . '_' . $f->bil . '_' . $f->nama_jawatan . '(' . $f->gred . ').pdf';
        
        // return response()->download('storage/'.$f->lokasi_fail, $nama_fail, ['title' => 'asdasd'], 'inline');

        return Storage::download($f->lokasi_fail, $nama_fail);
    }

    public function kemaskinijawatan(Request $req)
    {
        $id = $req->id;

        $sdsds = Iklan_jawatan::where('id', $req->id)->first();
        $iklan = Iklan::where('id', $sdsds->id_iklan)->first();

        if ($req->hasFile('failbaru')) {
            // return dd($id);

            $file = $req->file('failbaru');
            $filename = $file->hashName();
            $extension = $file->extension();

            // return dd($filename, $extension);
            if ($extension == 'pdf') {
                // check folder for 'current year', if not exist, create one
                $storagePath = $iklan->tahun . '/' . $iklan->bil;
                $storagePathSave = 'public/' . $iklan->tahun . '/' . $iklan->bil;
                $filePath = str_replace(base_path() . '/', '', $storagePath) . '/' . $filename;
                // return dd($filePath);
                $upload_success = $file->storeAs($storagePath, $filename);

                if ($upload_success) {
                    $old = Iklan_jawatan::where('id', $req->id)->first();
                    if (Storage::exists($old->lokasi_fail)) {
                        Storage::delete($old->lokasi_fail);
                    }

                    Iklan_jawatan::where('id', $req->id)->update([
                        'nama_jawatan' => $req->jawatan,
                        'gred' => $req->gred,
                        'gajiMin' => $req->gajiMin,
                        'kump_perkhidmatan' => $req->kump,
                        'taraf_jawatan' => $req->taraf,
                        'nama_fail' => $filename,
                        'format' => $extension,
                        'lokasi_fail' => $filePath,
                    ]);

                    Alert::info('Berjaya', 'Maklumat telah dikemaskini.');
                    return back();
                } else {
                    Alert::error('Tidak Berjaya', 'Muat naik tidak berjaya');
                    return back();
                }
            } else {
                Alert::error('Tidak Berjaya', 'Fail berformat PDF sahaja boleh di muat naik');
                return back()->withInput();
            }
        }
        else {
            Iklan_jawatan::where('id', $req->id)->update([
                'nama_jawatan' => $req->jawatan,
                'gred' => $req->gred,
                'gajiMin' => $req->gajiMin,
                'kump_perkhidmatan' => $req->kump,
                'taraf_jawatan' => $req->taraf,
            ]);
            Alert::info('Berjaya', 'Maklumat telah dikemaskini. tanpa fail');
            return back();
        }
    }

    public function padamjawatan(Request $req)
    {
        Iklan_jawatan::where('id', $req->id)->delete();

        Alert::error('Berjaya', 'Jawatan telah dibuang dari senarai iklan.');
        return back();
    }

    public function konfigurasi()
    {
        $taraf = JK_taraf_jawatan::all();
        $kumpulan = JK_kumuplan_perkhidmatan::all();
        $jenisPanggilan = JK_JenisPanggilan::all();

        return view('admin.konfigurasi', compact('taraf', 'kumpulan', 'jenisPanggilan'));
    }

    public function ujianTemuduga()
    {
        $jenisPanggilan = JK_JenisPanggilan::all();
        $listPanggilan = DB::table('jk_panggilan')->select('jk_panggilan.*', 'jk_jenis_panggilan.panggilan as jenis')
        ->join('jk_jenis_panggilan', 'jk_jenis_panggilan.id', '=', 'jk_panggilan.panggilan')->get();

        $bil_sesi = DB::table('jk_sesi_panggilan')
        ->select('id_panggilan', DB::raw('COUNT(id) as bil_sesi'))
        ->groupBy('id_panggilan')->get();

        return view('admin.ujian-temuduga', compact('jenisPanggilan', 'listPanggilan', 'bil_sesi'));
    }

    public function sesiPanggilan($id)
    {
        $sesi = DB::table('jk_sesi_panggilan')->where('id_panggilan', $id)->get();

        $bil_calon = DB::table('senarai_permohonan')->select('senarai_calon_sesi.id_panggilan','senarai_calon_sesi.id_sesi', DB::raw('COUNT(id_permohonan) as bil_calon'))
        ->join('senarai_calon_sesi', 'senarai_calon_sesi.id_permohonan1', '=', 'senarai_permohonan.id_permohonan')
        ->where('senarai_calon_sesi.id_panggilan', $id)
        ->groupBy('senarai_calon_sesi.id_sesi')
        ->get();

       
       
        return view('admin.sesi-panggilan', compact('id', 'sesi', 'bil_calon'));
    }

    public function calonPanggilan($id)
    {
        $senarai_pemohon = DB::table('senarai_permohonan')
        ->join('senarai_calon_sesi', 'senarai_calon_sesi.id_permohonan1', '=', 'senarai_permohonan.id_permohonan')
        ->where('senarai_calon_sesi.id_sesi', $id)
        ->get();

        $id = DB::table('jk_sesi_panggilan')->where('id', $id)->first();

        $id_panggilan = $id->id_panggilan;
        
        return view('admin.senarai-calon-panggilan', compact('id_panggilan','senarai_pemohon'));
    }

    public function tambahUjianTemuduga(Request $req)
    {
        DB::table('jk_panggilan')->insert([
            'panggilan' =>  $req->panggilan,
            'tarikh_mula' =>  $req->tarikh_mula,
            'tarikh_akhir' =>  $req->tarikh_tamat,
            'tahun' =>  $req->tahun_panggilan,
            'bil' =>  $req->bil_panggilan,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        toast('Maklumat ditambah', 'success')->position('top-end');
        return back();
    }
    
    public function tambahSesiUjianTemuduga(Request $req)
    {
        DB::table('jk_sesi_panggilan')->insert([
            'id_panggilan' =>  $req->id_panggilan,
            'sesi' =>  $req->sesi,
            'tarikh' =>  $req->tarikh,
            'masa' =>  $req->masa,
            'tempat' =>  $req->tempat,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
         ]);

        toast('Maklumat ditambah', 'success')->position('top-end');
        return back();
    }
    
    public function pentadbir()
    {
        $pentadbir = Admin::whereNotIn('lvl', ['super'])
        ->get();

        if (Auth::user()->lvl == '2') {
            return redirect('/admin');
        }
        return view('admin.pentadbir', compact('pentadbir'));
    }

    public function senaraiPermohonan($url)
    {
        // dd($url);
        $panggilan = DB::table('jk_panggilan')->select('jk_panggilan.*', 'jk_jenis_panggilan.panggilan AS jenis_panggilan')
        ->join('jk_jenis_panggilan', 'jk_jenis_panggilan.id', '=', 'jk_panggilan.panggilan')
        ->get();
        $sesi = DB::table('jk_sesi_panggilan')->get();

        $iklan = Iklan::where('url', $url)->first();

        $jawatan = DB::table('jumlah_pemohonan_jawatan_iklan')->where('id_iklan', $iklan->id)
        ->orderBy('kumpulan', 'ASC')->get();
        
        $jumlah = DB::table('jumlah_pemohonan_jawatan_iklan')->where('id_iklan', $iklan->id)->sum('bilangan');
        
        $senarai_pemohon = DB::table('senarai_permohonan')
        ->leftjoin('senarai_calon_sesi', 'senarai_calon_sesi.id_permohonan1', '=', 'senarai_permohonan.id_permohonan')
        ->where('id_iklan', $iklan->id)
        ->get();
        // dd($iklan, $jawatan);
        // 

        return view('admin.permohonan.senarai', compact('jawatan', 'iklan', 'jumlah', 'senarai_pemohon', 'panggilan', 'sesi'));
    }

    public function fetchSesi(Request $request)
    {
        $data['states'] = DB::table('jk_sesi_panggilan')
            ->where("id_panggilan", $request->country_id)
            ->get();
  
        return response()->json($data);
    }

    public function butiranPermohonan($id, $id2)
    {
        $permohonan = DB::table('senarai_permohonan')->where('id_permohonan', $id2)->first();

        $user = User::where('id', $id)->first();
        $maklumat_diri = DB::table('maklumat_diri_lengkap')->where('id', $id)->first();
        $senarai_ipt = DB::table('senarai_kelulusan_ipt')->where('user_id', $id)->get();
        $maklumat_tambahan = JK_MaklumatTambahan::where('id_pengguna', $id)->first();
        $pasangan = DB::table('jk_pasangan')->where('id_pengguna', $id)->get();
        $pengalaman = JK_Pengalaman::where('user_id', $id)
            ->orderBy('mula_kerja', 'desc')
            ->get();

        $pmr = JK_PMR::where('user_id', $id)->first();
        $k_pmr = KeputusanPMR::join('jk_senarai_matapelajaran_pt3', 'jk_senarai_matapelajaran_pt3.id', '=', 'jk_keputusan_pmr.matapelajaran')->where('id_pmr', $pmr->id)->get();
        $pencapaian_pmr = DB::table('pencapaian_pmr')->where('user_id', $id)->get();
        
        $spm = JK_SPM::where('user_id', $id)->first();
        $k_spm = DB::table('jk_keputusan_spm')->join('jk_senarai_matapelajaran_spm', 'jk_senarai_matapelajaran_spm.id', '=', 'jk_keputusan_spm.matapelajaran')->where('id_spm', $spm->id)->get();
        $pencapaian_spm = DB::table('pencapaian_spm')->where('user_id', $id)->get();
       
        $stpm = JK_STPA::where('user_id', $id)->first();
        
        if (count($stpm)>0) {
        $k_stpm = DB::table('jk_keputusan_stpm')->join('jk_senarai_matapelajaran_stpm', 'jk_senarai_matapelajaran_stpm.id', '=', 'jk_keputusan_stpm.matapelajaran')->where('id_stpm', $stpm->id)->get();
        $pencapaian_stpm = DB::table('pencapaian_stpm')->where('user_id', $id)->get();
        }

        $stam = JK_STAM::where('user_id', $id)->first();
        if (count($stam)>0) {
            $k_stam = DB::table('jk_keputusan_stam')->join('jk_senarai_matapelajaran_stam', 'jk_senarai_matapelajaran_stam.id', '=', 'jk_keputusan_stam.matapelajaran')->where('id_stam', $stam->id)->get();
            $pencapaian_stam = DB::table('pencapaian_stam')->where('user_id', $id)->get();
        }

        $skm = JK_SKM::select('jk_skm.*', 'jk_kelulusan.diskripsi')
            ->join('jk_kelulusan', 'jk_kelulusan.id_kelulusan', '=', 'jk_skm.namaSijil')
            ->where('user_id', $id)
            ->orderBy('tahunSijil', 'desc')
            ->get();

        $svm = JK_SVM::select('jk_svm.*', 'jk_kelulusan.diskripsi')
        ->join('jk_kelulusan', 'jk_kelulusan.id_kelulusan', '=', 'jk_svm.namaSijil')
        ->where('user_id', $id)
        ->first();

        $matrix = JK_Matrikulasi::where('user_id', $id)->first();


        return view('admin.butiran-permohon', compact('user', 'permohonan', 'senarai_ipt', 'maklumat_diri', 'pasangan', 'maklumat_tambahan', 'pengalaman', 'matrix', 'skm', 'svm','pmr', 'pencapaian_pmr','k_pmr', 'spm', 'pencapaian_spm','k_spm', 'stpm', 'pencapaian_stpm','k_stpm', 'stam', 'pencapaian_stam','k_stam'));
    }

    public function cetakButiranPermohonan($id, $id2)
    {
        $permohonan = DB::table('senarai_permohonan')->where('id_permohonan', $id2)->first();

        $user = User::where('id', $id)->first();
        $maklumat_diri = DB::table('maklumat_diri_lengkap')->where('id', $id)->first();
        $senarai_ipt = DB::table('senarai_kelulusan_ipt')->where('user_id', $id)->get();
        $maklumat_tambahan = JK_MaklumatTambahan::where('id_pengguna', $id)->first();
        $pasangan = DB::table('jk_pasangan')->where('id_pengguna', $id)->get();
        $pengalaman = JK_Pengalaman::where('user_id', $id)
            ->orderBy('mula_kerja', 'desc')
            ->get();

        $pmr = JK_PMR::where('user_id', $id)->first();
        $bpmr = JK_PMR::where('user_id', $id)->count();
        if ($bpmr>0) {
        $k_pmr = KeputusanPMR::join('jk_senarai_matapelajaran_pt3', 'jk_senarai_matapelajaran_pt3.id', '=', 'jk_keputusan_pmr.matapelajaran')->where('id_pmr', $pmr->id)->get();
        $pencapaian_pmr = DB::table('pencapaian_pmr')->where('user_id', $id)->get();
        }
        
        $spm = JK_SPM::where('user_id', $id)->first();
        $bspm = JK_SPM::where('user_id', $id)->count();
        if ($bspm>0) {
        $k_spm = DB::table('jk_keputusan_spm')->join('jk_senarai_matapelajaran_spm', 'jk_senarai_matapelajaran_spm.id', '=', 'jk_keputusan_spm.matapelajaran')->where('id_spm', $spm->id)->get();
        $pencapaian_spm = DB::table('pencapaian_spm')->where('user_id', $id)->get();
        }

        $spmu = JK_SPMU::where('user_id', $id)->first();
        $bspmu = JK_SPMU::where('user_id', $id)->count();
        if ($bspmu>0) {
        $k_spmu = DB::table('jk_keputusan_spm_ulangan')->join('jk_senarai_matapelajaran_spm', 'jk_senarai_matapelajaran_spm.id', '=', 'jk_keputusan_spm_ulangan.matapelajaran')->where('id_spmu', $spmu->id)->get();
        $pencapaian_spmu = DB::table('pencapaian_spm_ulangan')->where('user_id', $id)->get();
        }
       
        $stpm = JK_STPA::where('user_id', $id)->first();
        $bstpm = JK_STPA::where('user_id', $id)->count();
        
        if ($bstpm>0) {
        $k_stpm = DB::table('jk_keputusan_stpm')->join('jk_senarai_matapelajaran_stpm', 'jk_senarai_matapelajaran_stpm.id', '=', 'jk_keputusan_stpm.matapelajaran')->where('id_stpm', $stpm->id)->get();
        $pencapaian_stpm = DB::table('pencapaian_stpm')->where('user_id', $id)->get();
        }

        $stam = JK_STAM::where('user_id', $id)->first();
        $bstam = JK_STAM::where('user_id', $id)->count();
        if ($bstam>0) {
            $k_stam = DB::table('jk_keputusan_stam')->join('jk_senarai_matapelajaran_stam', 'jk_senarai_matapelajaran_stam.id', '=', 'jk_keputusan_stam.matapelajaran')->where('id_stam', $stam->id)->get();
            $pencapaian_stam = DB::table('pencapaian_stam')->where('user_id', $id)->get();
        }

        $skm = JK_SKM::select('jk_skm.*', 'jk_kelulusan.diskripsi')
            ->join('jk_kelulusan', 'jk_kelulusan.id_kelulusan', '=', 'jk_skm.namaSijil')
            ->where('user_id', $id)
            ->orderBy('tahunSijil', 'desc')
            ->get();

        $svm = JK_SVM::select('jk_svm.*', 'jk_kelulusan.diskripsi')
        ->join('jk_kelulusan', 'jk_kelulusan.id_kelulusan', '=', 'jk_svm.namaSijil')
        ->where('user_id', $id)
        ->first();

        $matrix = JK_Matrikulasi::where('user_id', $id)->first();


        return view('cetak.borang-permohonan', compact('user', 'pasangan','permohonan', 'senarai_ipt', 'maklumat_diri', 'maklumat_tambahan', 'pengalaman', 'matrix', 'skm', 'spmu', 'svm','pmr', 'pencapaian_pmr','k_pmr', 'spm', 'pencapaian_spm','k_spm', 'stpm', 'pencapaian_stpm','k_stpm', 'stam', 'pencapaian_stam','k_stam'));

        // $pdf = PDF::loadview('cetak.borang-permohonan', compact('user', 'permohonan', 'senarai_ipt', 'maklumat_diri', 'pasangan', 'maklumat_tambahan', 'pengalaman', 'matrix', 'spmu', 'skm', 'svm','pmr', 'pencapaian_pmr','k_pmr', 'spm', 'pencapaian_spm','k_spm', 'stpm', 'pencapaian_stpm','k_stpm', 'stam', 'pencapaian_stam','k_stam'));
        // return $pdf->setPaper('a4','potrait')->stream();
    }

    public function pilihanPanggilan(Request $req)
    {
        $panggilan = $req->panggilan;
        $siri = $req->siri;
        if (count($req->id_permohonan)<1) {

            Alert::error('Amaran', 'Sila Pilih calon');
        
            return back();
        }
        for ($i = 0; $i < count($req->id_permohonan); $i++) {
            
            DB::table('jk_senarai_calon_sesi_panggilan')->insert([
                'id_panggilan' => $panggilan,
                'sesi' => $siri,
                'id_permohonan' => $req->input('id_permohonan.' . $i),
                'status' => '',
                'catatan' => '',
                'created_at' => \Carbon\carbon::now(),
            ]);

            Alert::success('Berjaya', 'Calon telah disenaraikan');
        
            return back();
        }

       
    }

    public function tambahkumpulanjawatan(Request $req)
    {
        $data = new JK_kumuplan_perkhidmatan();
        $data->kump_perkhidmatan = $req->kumpulan_jawatan;
        $data->save();

        Alert::success('Berjaya', 'Maklumat berjaya ditambah');
        
        return back();
    }

    public function kemaskinikumpulanjawatan(Request $r)
    {
        JK_kumuplan_perkhidmatan::where('id', $r->id)->update([
            'kump_perkhidmatan' => $r->kumpulan_jawatan,
        ]);

        Alert::success('Berjaya', 'Maklumat berjaya dikemaskini');
        return back();
    }

    public function padamkumpulanjawatan(Request $r)
    {
        JK_kumuplan_perkhidmatan::where('id', $r->id)->delete();

        Alert::success('Berjaya', 'Maklumat berjaya dipadam');
        return back();
    }

    public function tambahpentadbir(Request $req)
    {
    //    $req->validate([
    //         'nama' => 'required',
    //         'ic' => 'required|unique:jk_admin',
    //         'email' => 'required|unique:jk_admin|email',
    //         'lvl' => 'required',
    //     ]);
       
        // $validated = Validator::make($req->all(), [
        //     'nama' => 'required',
        //     'ic' => 'required|unique:jk_admin',
        //     'email' => 'required|unique:jk_admin|email',
        //     'lvl' => 'required',
        // ]);

        // if ($validated->fails()) {
        //     return back()->withErrors($validated)->withInput();
        // }

        Admin::insert([
            'nama' => $req->nama,
            'ic' => $req->ic,
            'email' => $req->email,
            'lvl' => $req->peranan,
            'password' => Hash::make($req->ic),
            'created_at' => \Carbon\Carbon::now(),
        ]);
        
        
        Alert::success('Berjaya', 'Pentadbir berjaya ditambah');
        return back();
    }

    public function tambahtarafjawatan(Request $req)
    {
        $data = new JK_taraf_jawatan();
        $data->taraf = $req->taraf_jawatan;
        $data->singkatan_taraf = $req->singkatan;
        $data->save();

        Alert::success('Berjaya', 'Maklumat berjaya ditambah');
        return back();
    }

    public function tambahJenisPanggilan(Request $req)
    {
        $data = new JK_JenisPanggilan();
        $data->panggilan = $req->jenis_panggilan;
        $data->save();

        Alert::success('Berjaya', 'Maklumat berjaya ditambah');
        return back();
    }
    public function kemaskinijenispanggilan(Request $req)
    {
        JK_JenisPanggilan::where('id', $req->id)->update([
            'panggilan' => $req->jenis_panggilan
        ]);

        Alert::success('Berjaya', 'Maklumat berjaya dikemaskini');
        return back();
    }
    public function padamjenispanggilan(Request $req)
    {
        JK_JenisPanggilan::where('id', $req->id)->delete();

        Alert::success('Berjaya', 'Maklumat berjaya dipadam');
        return back();
    }

    public function kemaskinitarafjawatan(Request $req)
    {
        JK_taraf_jawatan::where('id', $req->id)->update([
            'taraf' => $req->taraf_jawatan,
            'singkatan_taraf' => $req->singkatan,
        ]);

        Alert::success('Berjaya', 'Maklumat berjaya dikemaskini');
        return back();
    }

    public function padamtarafjawatan(Request $r)
    {
        JK_taraf_jawatan::where('id', $r->id)->delete();

        Alert::success('Berjaya', 'Maklumat berjaya dipadam');
        return back();
    }

    public function kemaskinipentadbir(Request $r)
    {
        $id = $r->id;

        Admin::where('id', $id)
        ->update([
            'nama' => $r->nama,
            'ic' => $r->ic,
            'email' => $r->email,
            'lvl' => $r->peranan,
        ]);

        toast('Maklumat dikemaskini', 'success')->position('top-end');
        return back();
    }

    public function padampentadbir(Request $req)
    {
        $id = $req->id;

        Admin::where('id', $id)
        ->delete();

        toast('Pentadbir dipadam', 'success')->position('top-end');
        return back();
    }

    public function cetakiklan($id)
    {
        $iklan = DB::table('senarai-syarat-jawatan')
        ->where('id_iklan', $id)
        ->get();

        $iklan2 = Iklan::where('id', $id)->first();

        // return view('admin.pdf.cetak-iklan', compact('iklan', 'iklan2'));
        $pdf = PDF::loadview('admin.pdf.cetak-iklan', compact('iklan', 'iklan2'));
        return $pdf->setPaper('a4','potrait')->stream();
        // return $pdf->download('Iklan Jawatan '.$iklan2->tahun.' '.$iklan2->bil.'.pdf');
    }

    public function exportSenaraiPemohon($id, $id2) 
    {
        return Excel::download(new ExportPemohon($id, $id2), 'Senarai Pemohon.xlsx');
    }
}
