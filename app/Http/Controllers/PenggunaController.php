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
        $tarikh_kini = \Carbon\Carbon::now()->format('Y-m-d');
        // $tarikh_mula =\Carbon\Carbon::parse($ikln->tarikh_mula)->format('Y-m-d');
        // $tarikh_tamat =\Carbon\Carbon::parse($ikln->tarikh_tamat)->format('Y-m-d');

        $syarat = DB::table('senarai-syarat-jawatan')->get();

        $iklan = Iklan::where('tarikh_mula','<=',$tarikh_kini)
        ->where('tarikh_tamat', '>=', $tarikh_kini)
        ->where('jenis', "TERBUKA")
        ->get();


        return view('pengguna.iklan', compact('iklan', 'syarat'));
    }

    public function maklumatdiri()
    {
        $negeri = JK_Negeri::all();
        $agama = JK_Agama::all();
        $keturunan = JK_Keturunan::all();
        $taraf = JK_Taraf::all();

        $user = User::where('id', Auth::user()->id)->first();

        return view('pengguna.maklumat-diri', compact('user', 'negeri', 'agama', 'keturunan', 'taraf'));
    }

    public function pengalaman()
    {
        return view('pengguna.pengalaman');
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
        return view('pengguna.akademik.matrikulasi');
    }
    public function ipt()
    {
        return view('pengguna.akademik.pengajian-tinggi');
    }

    public function kemaskinimaklumatdiri(Request $req, $id)
    {
        Alert::success('Berjaya', 'Maklumat dikemaskini');
        // Toast('Maklumat Dikemaskini', 'success')->position('top-end');
        return back();
    }
}
