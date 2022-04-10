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

class PenggunaController extends Controller
{
    public function iklan()
    {
        $syarat = DB::table('senarai-syarat-jawatan')->get();
        $iklan = Iklan::all();

        return view('pengguna.iklan', compact('iklan', 'syarat'));
    }

    public function maklumatdiri()
    {
        return view('pengguna.maklumat-diri');
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
}
