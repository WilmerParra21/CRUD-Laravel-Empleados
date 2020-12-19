@extends('layout')
@section('title')
Agregar Empleado
@endsection
@section('contenido')

<h1 class="text-center text-primary border-bottom border-dark pb-2 ">Agregar Empleado</h1>

<form method="POST" action="{{route('empleado.guardar')}}" enctype="multipart/form-data" accept-charset="utf-8" class="mt-3 container-xl">

	@csrf

	
<div class="form-row mb-2 d-flex">
	
	<input type="file" name="avatar" class="ml-2 mt-5">
	
</div>
	{!! $errors->first('avatar', '<small>:message</small><br>') !!}
	
	<div class="mb-1">
	<input type="text" name="nombre" placeholder="Nombre" class="form-control" class="mb-1">
	
	{!! $errors->first('nombre', '<small>:message</small><br>') !!}
</div>
<div class="mb-1">
	<input type="text" name="apellido" placeholder="Apellido" class="form-control" class="mb-1">
	
	{!! $errors->first('apellido', '<small>:message</small><br>') !!}
</div>
<div class="mb-1">
	<input type="email" name="correo" placeholder="Correo" class="form-control" class="mb-1">
	
	{!! $errors->first('correo', '<small>:message</small><br>') !!}
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