<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iklan extends Model
{
    protected $table = 'jk_iklan';

    protected $dates = ['tarikh_mula', 'tarikh_tamat'];
}
