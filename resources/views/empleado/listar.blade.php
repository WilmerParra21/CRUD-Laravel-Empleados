@extends('layout')
@section('title')
Lista de Empleados
@endsection
@section('contenido')

<div class="container">
@if(Session::has('modificar'))

<div class="alert alert-warning">
    <a href="{{route('empleado.index')}}" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Modifico!</strong> {{session('modificar')}}
  </div>

@endif
@if(Session::has('guardar'))

<div class="alert alert-success">
    <a href="{{route('empleado.index')}}" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>guardo!</strong> {{session('guardar')}}
  </div>

@endif
@if(Session::has('eliminar'))

<div class="alert alert-danger">
    <a href="{{route('empleado.index')}}" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Elimino!</strong> {{session('eliminar')}}
  </div>

@endif
</div>


<h1 class="text-center mt-2">Lista de Empleados</h1>
<div class="container-xl">
	<div class="d-flex justify-content-right align-items-end">
	@auth
	@if(auth()->user()->hasRol(['Administrador']))
		<a href="{{route('empleado.agregar')}}" class="btn btn-block btn-primary align-items-end">Agregar</a>
	@endif
	@endauth
	</div>
	<table class="table">
		<thead class="table-dark">
			<tr>
				<th class="text-center" scope="col">Nombre</th>
				<th class="text-center" scope="col">Apellido</th>
				<th class="text-center" scope="col">Correo</th>
				<th class="text-center" scope="col">Cargo</th>
				<th class="text-center" scope="col">Fecha de Creacion</th>
				<th class="text-center">Acciones</th>
			</tr>
		</thead>

		<tbody>
			@foreach($empleado as $empe)
			<tr>
				<td>{{$empe->nombre}}</td>
				<td>{{$empe->apellido}}</td>
				<td>{{$empe->correo}}</td>
				<td>{{$empe->cargo}}</td>
				<td>{{$empe->created_at->diffforHumans()}}</td>
			<td>
	<a href="{{route('empleado.detalle', $empe)}}" class="btn btn-info">Ver Detalle</a>

	@auth
	@if(auth()->user()->hasRol(['Administrador']))
	<a href="{{route('empleado.editar', $empe)}}" class="btn btn-warning">Editar</a>
	<a href="{{route('empleado.delete', $empe)}}" class="btn btn-danger" onclick="confirm('¿Desea Eliminar?')">Eliminar</a>
	@endif
	@endauth
			</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection