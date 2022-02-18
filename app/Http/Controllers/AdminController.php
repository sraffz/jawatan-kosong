<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Iklan;
use App\JK_kumuplan_perkhidmatan;
use App\JK_taraf_jawatan;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
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

        return view('admin.iklan', compact('iklan'));
    }

    public function tetapan()
    {
        return view('admin.tetapan');
    }

    public function bukaiklan(Request $req)
    {
        $bil = Iklan::where('tahun', now()->year)
        ->count();
        // return dd(\Carbon\Carbon::now());

        $id = Iklan::insertGetId([
            'tahun' => now()->year,
            'bil' => $bil+1,
            'tarikh_mula' => $req->tarikhmula,
            'tarikh_tamat' => $req->tarikhtamat,
            'jenis' => $req->jenisiklan,
            'pautan' => $req->pautan,
            'id_pencipta' => Auth::user()->id,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        return redirect('/admin/kemaskini-iklan/'.$id.'');
    }

    public function kemaskiniiklan($id)
    {
        $iklan = Iklan::where('id', $id)->first();

        return view('admin.kemaskini-iklan', compact('iklan'));
    }

    public function konfigurasi()
    {
        $taraf = JK_taraf_jawatan::all();
        $kumpulan = JK_kumuplan_perkhidmatan::all();

        return view('admin.konfigurasi',compact('taraf', 'kumpulan'));
    }

    public function tambahkumpulanjawatan(Request $req)
    {
        $data = new JK_kumuplan_perkhidmatan;
        $data->kump_perkhidmatan = $req->kumpulan_jawatan;
        $data->save();

        return back();
    }

    public function kemaskinikumpulanjawatan(Request $r)
    {
        JK_kumuplan_perkhidmatan::where('id', $r->id)
        ->update([
            'kump_perkhidmatan' => $r->kumpulan_jawatan
        ]);

        return back();
    }

    public function padamkumpulanjawatan(Request $r)
    {
        JK_kumuplan_perkhidmatan::where('id', $r->id)
        ->delete();

        return back();
    }

    public function tambahtarafjawatan(Request $req)
    {
        $data = new JK_taraf_jawatan;
        $data->taraf = $req->taraf_jawatan;
        $data->singkatan_taraf = $req->singkatan;
        $data->save();

        return back();
    }

    public function kemaskinitarafjawatan(Request $req)
    {
        JK_taraf_jawatan::where('id', $req->id)
        ->update([
            'taraf' => $req->taraf_jawatan,
            'singkatan_taraf' => $req->singkatan
        ]);

        return back();
    }

    public function padamtarafjawatan(Request $r)
    {
        JK_taraf_jawatan::where('id', $r->id)
        ->delete();

        return back();
    }
}
