<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    use HasFactory;
    protected $guarded = [];
    //protected $fillable = ['nombre', 'apellido', 'correo', 'cargo'];
    // en caso de que la tabla no e llame igual
    //protected $table="nombredetabla";
}
