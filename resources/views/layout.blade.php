<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title', 'Aplicativo')</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-light" href="#">Inicio</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link text-light" href="{{route('empleado.index')}}">Empleados</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="#">Contacto</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0 mr-5">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
    <ul class="nav navbar-nav navbar-right">
    @guest
    <li><a class="nav-link text-light mr-2" href="{{route('register')}}">Registrarse</a></li>
    @endguest

    @guest
    <li><a class="nav-link text-light mr-2" href="{{route('login')}}">Iniciar Sesión</a></li>
    @else
    <li class="nav-item active mr-2"><a class="nav-link text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a></li>
    @endguest

    <li class="nav-item active">
    @auth
    <a class="nav-link text-success" href="#">Bienvenido {{auth()->user()->name}}</a>
    @endauth
    </li>
    </ul>
  </div>
</nav>
<form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
@csrf
</form>

@yield('contenido')
</body>
</html>