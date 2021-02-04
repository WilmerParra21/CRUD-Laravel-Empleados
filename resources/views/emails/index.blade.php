@extends('layout')
@section('title')
Contacto
@endsection
@section('contenido')

<form action="{{route('emails.enviar')}}" method="post" accept-charset="utf-8" class="m-5 p-5">
@csrf
<label for="nombre">Nombre:</label>
<input type="text" name="nombre" placeholder="" class="form-control">

<label for="correo">Correo</label>
<input type="email" name="correo" class="form-control">

<label for="mensaje">Mensaje:</label>
<textarea name="mensaje" class="form-control"></textarea>

<input type="submit" class="btn btn-primary mt-4 px-4" value="Enviar Datos">
</form>

@stop