@extends('layout')
@section('title')
Detalle de Empleado
@endsection
@section('contenido')

<div class="card" style="width: 50rem">
	<div class="card-body bg-success">
	<h5 class="card-title border-bottom border-dark text-light font-weight-bold pb-2">Detalle Empleado</h5>

	<p class="card-text text-light">id: {{$empleado->id}}</p>
	<p class="card-text text-light">Nombre: {{$empleado->nombre}}</p>
	<p class="card-text text-light">Apellido: {{$empleado->apellido}}</p>
	<p class="card-text text-light">Correo: {{$empleado->correo}}</p>
	<p class="card-text text-light border-bottom border-light">Cargo: {{$empleado->cargo}}</p>
	
	<p class="card-text text-light">Fecha de Creacion: {{$empleado->created_at->diffforHumans()}}</p>

	<p class="card-text text-light ">Fecha de Actualización: {{$empleado->updated_at->diffforHumans()}}</p>
	<div class="d-flex justify-content-between align-items-center">
		<a href="{{route('empleado.index')}}" class="btn btn-danger btn">volver</a>
	</div>
	</div>
</div>
@endsection