@extends('layout')
@section('title')
Editar Empleado
@endsection
@section('contenido')

<h1 class="text-center text-primary border-bottom border-dark pb-2 ">Editar Empleado</h1>

<form method="POST" action="{{route('empleado.update', $empleado)}}" enctype="multipart/form-data" accept-charset="utf-8" class="mt-3 container-xl">

	@csrf @method('PUT')

<div class="form-row mb-2 d-flex">
	<img src="{{asset(Storage::url($empleado->avatar))}}" width="150">

	<input type="file" name="avatar" class="ml-2 mt-5">
	
</div>
{!! $errors->first('avatar', '<small>:message</small><br>') !!}

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
	<select name="cargos_id" class="form-control">
	@foreach($cargo as $car)	
	<option value="{{$car->id}}" {{$car->id == $empleado->cargos_id ? 'selected' : ''}}>{{$car->nombre}}</option>
	@endforeach
	</select>
	{!! $errors->first('cargos_id', '<small>:message</small><br>') !!}
</div>

<br>
	<button type="reset" class="btn btn-danger">Borrar</button>

	<button type="submit" class="btn btn-primary">Enviar</button>

</form>

</form>
@endsection
