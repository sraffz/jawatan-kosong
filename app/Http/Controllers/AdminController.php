<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Iklan;
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

        Iklan::insertGetId([
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

        return view('admin.iklan');
    }

    public function kemaskiniiklan($id)
    {
        $iklan = Iklan::where('id', $id)->first();

        return view('admin.kemaskini-iklan', compact('iklan'));
    }
}
