@extends('layout')
@section('title')
Agregar Empleado
@endsection
@section('contenido')

<h1 class="text-center text-primary border-bottom border-dark pb-2 ">Agregar Empleado</h1>

<form method="POST" action="{{route('empleado.agregar')}}" accept-charset="utf-8" class="mt-3 container-xl">

	@csrf
	<div class="mb-1">
	<input type="text" name="nombre" placeholder="Nombre" class="form-control" class="mb-1">
	
	{!! $errors->first('nombre', '<small>:message</small><br>') !!}
</div>
<div class="mb-1">
	<input type="text" name="apellido" placeholder="Apellido" class="form-control" class="mb-1">
	
	{!! $errors->first('apellido', '<small>:message</small><br>') !!}
</div>
<div class="mb-1">
	<input type="email" name="email" placeholder="Correo" class="form-control" class="mb-1">
	
	{!! $errors->first('email', '<small>:message</small><br>') !!}
</div>
<div class="mb-1">
	<input type="text" name="cargo" placeholder="Cargo" class="form-control" class="mb-1">
	
	{!! $errors->first('cargo', '<small>:message</small><br>') !!}
</div>
<br>
	<button type="reset" class="btn btn-danger">Borrar</button>

	<button type="submit" class="btn btn-primary">Enviar</button>

</form>

</form>
@endsection