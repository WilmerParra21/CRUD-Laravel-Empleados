<?php

use App\Models\Empleados;
use Illuminate\Http\Request;
use Http\Request\EmpleadoPost;

class EmpleadoController extends Controller
{  
    //index
    public function listarEmpleados()
    {
        // se seleciona la tabla señalada sin modelo
        //$empleado = DB::table('empleados')->get();
    // usando el modelo
   // $empleado = Empleados::get();
    // ordenamiento por nombre de forma asc
   // $empleado = Empleados::orderBy('nombre')->get();
    // ordenamiento de forma desc por el campo created_at
    $empleado = Empleados::orderBy('created_at', 'DESC')->get();
    // en la vista, al agregar ese metodo muestra hace cuanto se actualizo
    // $empe->created_at->diffforHumans()

        // con el compact se envia a la vista
    return view('empleado.listar', compact('empleado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

         return view('empleado.agregar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // store
    public function agregarEmpleado(EmpleadoPost $validar){

// añadir datos a la BD
Empleados::create($validar->validated());


return redirect()->route('empleado.index');
       /*
        return $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email', 
            'cargo' => 'required']);
       */
       }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // show
    public function buscarEmpleado($id)
    {
$empleado = Empleados::find($id);

 return view('empleado.detalle', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
