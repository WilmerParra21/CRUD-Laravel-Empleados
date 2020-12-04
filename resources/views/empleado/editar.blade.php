@extends('layout')
@section('title')
Editar Empleado
@endsection
@section('contenido')

<h1 class="text-center text-primary border-bottom border-dark pb-2 ">Editar Empleado</h1>

<form method="POST" action="{{route('empleado.update', $empleado)}}" accept-charset="utf-8" class="mt-3 container-xl">

	@csrf @method('PUT')
	<div class="mb-1">
	<input type="text" name="nombre" value="{{$empleado->nombre}}" placeholder="Nombre" class="form-control" class="mb-1">
	
	{!! $errors->first('nombre', '<small>:message</small><br>') !!}
</div>
<div class="mb-1">
	<input type="text" name="apellido" value="{{$empleado->apellido}}" placeholder="Apellido" class="form-control" class="mb-1">
	
	{!! $errors->first('apellido', '<small>:message</small><br>') !!}
</div>
<div class="mb-1">
	<input type="email" name="correo" value="{{$empleado->correo}}" placeholder="Correo" class="form-control" class="mb-1">
	
	{!! $errors->first('correo', '<small>:message</small><br>') !!}
</div>
<div class="mb-1">
	<input type="text" name="cargo" value="{{$empleado->cargo}}" placeholder="Cargo" class="form-control" class="mb-1">
	
	{!! $errors->first('cargo', '<small>:message</small><br>') !!}
</div>
<br>
	<button type="reset" class="btn btn-danger">Borrar</button>

	<button type="submit" class="btn btn-primary">Enviar</button>

</form>

</form>
@endsection