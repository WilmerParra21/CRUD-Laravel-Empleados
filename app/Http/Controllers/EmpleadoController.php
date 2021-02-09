<?php
namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;
use App\Http\Requests\EmpleadoPost;
use App\Models\Cargo;

class EmpleadoController extends Controller
{  

    public function __construct()
    {
    
   // $this ->middleware('auth')->only("listarEmpleados" );
   $this->middleware(['auth', 'rol:Administrador'])->except('listarEmpleados', 'buscarEmpleado');
}

    //index
    public function listarEmpleados(Request $request)
    {
        // se seleciona la tabla señalada sin modelo
        //$empleado = DB::table('empleados')->get();
    // usando el modelo
   // $empleado = Empleados::get();
    // ordenamiento por nombre de forma asc
   // $empleado = Empleados::orderBy('nombre')->get();
    // ordenamiento de forma desc por el campo created_at
    // $empleado = Empleados::orderBy('created_at', 'DESC')->paginate(2);
    // en la vista, al agregar ese metodo muestra hace cuanto se actualizo
    // $empe->created_at->diffforHumans()
        // con el compact se envia a la vista

            if($request){
                $query = trim($request->get('datos'));

                $empleado = Empleados::where('nombre', 'LIKE', '%' .$query. '%')->orderBy('id', 'asc')->paginate(2);

                return view('empleado.listar', compact('empleado'));
            }
  //  return view('empleado.listar', compact('empleado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargo = Cargo::all();
        return view('empleado.agregar', compact('cargo'));
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
//Empleados::create($validar->validated());

// se crea el objeto por medio del fill
$empleado=(new Empleados)->fill($validar->validated());
if($validar->hasFile('avatar')){
    $empleado->avatar=$validar->file('avatar')->store('public');
}
$empleado->save();

return redirect()->route('empleado.index')->with('guardar', 'Se ha Agregado Correctamente');
       /*
        return $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email', 
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
    public function editarEmpleado($id)
    {
        $empleado = Empleados::find($id);
        $cargo    = Cargo::all();

        return view('empleado.editar', compact('empleado', 'cargo'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizarEmpleado(EmpleadoPost $request, $id)
    {
        $empleado = Empleados::find($id);

        if($request->hasFile('avatar')){
             $empleado->avatar=$request->file('avatar')->store('public');
        }
        $empleado->update($request->validated());

        return redirect()->route('empleado.index')->with('modificar', 'Se ha Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function cambiarEstado($id, $estado){
        $empleado = Empleados::find($id);

        if($empleado==null){
             return redirect()->route('empleado.index');
        }
       $empleado->update(['estado'=> $estado]);

       return redirect()->route('empleado.index');
     }

    public function eliminarEmpleado($id)
    {
        $empleado = Empleados::find($id);
        $empleado->delete();
        return redirect()->route('empleado.index')->with('eliminar', 'Se ha Eliminado Correctamente');
    }
}