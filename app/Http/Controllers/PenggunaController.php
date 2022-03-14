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
        return view('pengguna.iklan');
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
}