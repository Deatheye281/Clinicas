<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fechadia extends Model
{
    protected $fillable = ['fecha', 'idpaciente', 'iddiagnostico'];
}
