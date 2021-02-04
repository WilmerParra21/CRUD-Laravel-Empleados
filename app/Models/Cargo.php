<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;
  
    //relacion de uno a muchos con la tabla empleados
    public function empleado(){

        return $this->hasMany(Empleados::class);
    }
}
