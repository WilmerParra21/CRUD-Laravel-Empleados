<?php

namespace App\Repositories;

use App\Models\Cargo;
use App\Models\Empleados;
use Illuminate\Http\Request;

class EmpleadoRepo{

    public function findAllEmpleados(Request $request){

    $query = trim($request->get('datos'));

    $empleado = Empleados::where('nombre', 'LIKE', '%' .$query. '%')->orderBy('id', 'asc')->paginate(2);

    return $empleado;
    }

    public function agregarEmpleado(Request $validar){

        // añadir datos a la BD
        //Empleados::create($validar->validated());

        // se crea el objeto por medio del fill
        $empleado=(new Empleados)->fill($validar->validated());
        if($validar->hasFile('avatar')){
            $empleado->avatar=$validar->file('avatar')->store('public');
        }
        $empleado->save();  

        return $empleado;
    }

    public function actualizar(Request $request, $id){
        $empleado = Empleados::find($id);

        if($request->hasFile('avatar')){
            $empleado->avatar=$request->file('avatar')->store('public');
        }
        $empleado->update($request->validated());

        return $empleado;
    }

    public function buscar($id){
        $empleado = Empleados::find($id);

        return $empleado;
    }

    public function editar(){
        
        $cargo = Cargo::all();

        return $cargo;
    }

    public function eliminar($id){
        $empleado = Empleados::find($id);
        $empleado->delete();

        return $empleado;
    }
}
?>