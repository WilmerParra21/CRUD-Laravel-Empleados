@extends('layout')
@section('title')
Lista de Empleados
@endsection
@section('contenido')

<h1 class="text-center mt-2">Lista de Empleados</h1>
<div class="container-xl">
	<div class="d-flex justify-content-right align-items-end">
		<a href="{{route('empleado.agregar')}}" class="btn btn-block btn-primary align-items-end">Agregar</a>
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

	<a href="" class="btn btn-warning">Editar</a>

	<a href="" class="btn btn-danger">Eliminar</a>
			</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection