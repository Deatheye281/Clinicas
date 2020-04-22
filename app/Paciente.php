<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use SoftDeletes;
    protected $fillable = ['N_registro', 'N_cama', 'nombre', 'direccion', 'F_nacimiento', 'sexo', 'idsala'];
}
