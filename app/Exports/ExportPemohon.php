<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class ExportPemohon implements FromCollection
{
    protected $id_jawatan;
    protected $id_iklan;

    public function __construct(int $id, int $id2)
    {
        $this->id_jawatan = $id;
        $this->id_iklan = $id2;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('excel')
        ->where('id_iklan_jawatan', $this->id_jawatan)
        ->where('id_iklan', $this->id_iklan)
        ->get();
    }
}
