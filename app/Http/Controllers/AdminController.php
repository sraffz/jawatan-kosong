<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Iklan;
use App\JK_kumuplan_perkhidmatan;
use App\JK_taraf_jawatan;
use App\Iklan_jawatan;
use Auth;
use Alert;
use DB;
use PDF;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
        return view('admin');
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
        ->count();

        $bil_tutup = Iklan::where('tarikh_mula','<=',$tarikh_kini)
        ->where('tarikh_tamat', '>=', $tarikh_kini)
        ->where('jenis', "TERTUTUP")
        ->count();

        // dd($bil_terbuka, $bil_tutup);
        return view('admin.iklan', compact('iklan', 'syarat', 'bil_terbuka', 'bil_tutup', 'iklan_last'));
    }

    public function tetapan()
    {
        return view('admin.tetapan');
    }

    public function bukaiklan(Request $req)
    {
        $bil = Iklan::where('tahun', now()->year)->count();

        $random = Str::random(5);

        $id = Iklan::insertGetId([
            'tahun' => now()->year,
            'bil' => $bil + 1,
            'tarikh_mula' => $req->tarikhmula,
            'tarikh_tamat' => $req->tarikhtamat,
            'jenis' => $req->jenisiklan,
            'pautan' => $req->pautan,
            'id_pencipta' => Auth::user()->id,
            'url' => $random,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $d = $random;
        Alert::success('Berjaya', 'Iklan baru berjaya ditambah');
        return redirect('/admin/kemaskini-iklan/' . $d . '');
    }

    public function kemaskiniiklan($id)
    {
        $iklan = Iklan::where('url', $id)->first();
        $taraf = JK_taraf_jawatan::all();
        $kump = JK_kumuplan_perkhidmatan::all();

        $syarat = DB::table('senarai-syarat-jawatan')
            ->where('id_iklan', $iklan->id)
            ->get();

            // Toast('Done Update', 'success')->position('top-end')->theme('success');
            toastr()->error('An error has occurred please try again later.');

        return view('admin.kemaskini-iklan', compact('iklan', 'syarat', 'taraf', 'kump'));
    }

    public function kemaskiniiklann(Request $req, $id)
    {
        $id = Iklan::where('id', $id)->update([
            'tahun' =>$req->tahun,
            'bil' => $req->bil,
            'tarikh_mula' => $req->tarikhmula,
            'tarikh_tamat' => $req->tarikhtamat,
            'jenis' => $req->jenisiklan,
            'pautan' => $req->pautan,
            'id_pencipta' => Auth::user()->id,
            'updated_at' => \Carbon\Carbon::now(),
        ]);

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
                $filePath = str_replace(base_path() . '/', '', $storagePath) . '/' . $filename;
                // return dd($filePath);
                $upload_success = $file->storeAs($storagePath, $filename);

                if ($upload_success) {
                    $data = new Iklan_jawatan();
                    $data->id_iklan = $id;
                    $data->nama_jawatan = $req->jawatan;
                    $data->gred = $req->gred;
                    $data->kump_perkhidmatan = $req->kump;
                    $data->taraf_jawatan = $req->taraf;
                    $data->nama_fail = $filename;
                    $data->format = $extension;
                    $data->lokasi_fail = $filePath;
                    $data->save();

                    Alert::success('Berjaya', 'Permohonan Berjaya DidaftarKan');
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
        }
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
        // else {
        //     Iklan_jawatan::where('id', $req->id)->update([
        //         'nama_jawatan' => $req->jawatan,
        //         'gred' => $req->gred,
        //         'kump_perkhidmatan' => $req->kump,
        //         'taraf_jawatan' => $req->taraf,
        //     ]);
        //     Alert::info('Berjaya', 'Maklumat telah dikemaskini. tanpa fail');
        //     return back();
        // }
    }

    public function padamjawatan(Request $req)
    {
        Iklan_jawatan::where('id', $req->id)->delete();

        Alert::error('Berjaya', 'Jawatan telah dibuang dari senarai iklan.');
        return back();
    }

    public function dlsyarat($id)
    {
        $f = Iklan_jawatan::where('jk_iklan_jawatan.id', $id)
            ->join('jk_iklan', 'jk_iklan.id', '=', 'jk_iklan_jawatan.id_iklan')
            ->first();

        $nama_fail = 'SUK-JK_' . $f->tahun . '_' . $f->bil . '_' . $f->nama_jawatan . '(' . $f->gred . ').pdf';
        // return dd($nama_fail);
        // return dd($f->lokasi_fail);
        return Storage::download($f->lokasi_fail, $nama_fail);
    }

    public function konfigurasi()
    {
        $taraf = JK_taraf_jawatan::all();
        $kumpulan = JK_kumuplan_perkhidmatan::all();

        return view('admin.konfigurasi', compact('taraf', 'kumpulan'));
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

    public function tambahtarafjawatan(Request $req)
    {
        $data = new JK_taraf_jawatan();
        $data->taraf = $req->taraf_jawatan;
        $data->singkatan_taraf = $req->singkatan;
        $data->save();

        Alert::success('Berjaya', 'Maklumat berjaya ditambah');
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

    public function cetakiklan($id)
    {
        $iklan = DB::table('senarai-syarat-jawatan')
        ->where('id_iklan', $id)
        ->get();

        $iklan2 = Iklan::where('id', $id)->first();

        // return view('admin.pdf.cetak-iklan', compact('iklan', 'iklan2'));
        $pdf = PDF::loadview('admin.pdf.cetak-iklan', compact('iklan', 'iklan2'))->setPaper('a4','potrait');
        return $pdf->download('Iklan Jawatan '.$iklan2->tahun.' '.$iklan2->bil.'.pdf');
    }
}
