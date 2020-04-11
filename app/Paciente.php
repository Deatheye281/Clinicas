<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = ['N_registro', 'N_cama', 'nombre', 'direccion', 'F_nacimiento', 'sexo', 'idsala'];
}
