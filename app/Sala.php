<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sala extends Model
{
    use SoftDeletes;
    protected $fillable = ['nombre', 'c_camas', 'idhospital'];
}
