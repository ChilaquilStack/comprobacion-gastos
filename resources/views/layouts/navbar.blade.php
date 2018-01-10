<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img src="{{asset('img/jal00.svg')}}" alt="logo" class="img-responsive" style="width: 40px; height: 30px">
      </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuracion<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="dropdown-submenu">
              <a href="#" class="test" tabindex="-1">Estructura Administratiba<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#" tabindex="-1">Unidad Presupuestas</a></li>
                <li><a href="#" tabindex="-1">Unidad Responsable</a></li>
                <li><a href="#" tabindex="-1">Unidad Ejecutora del Gasto</a></li>
                <li><a href="{{route('municipio.index')}}" tabindex="-1">Municipios</a></li>
                <li><a href="{{route('region.index')}}" tabindex="-1">Regiones</a></li>
                <li><a href="{{route('escuela.index')}}" tabindex="-1">Escuelas</a></li>
              </ul>
            </li>
            <li><a href="#">Tipo de Programa General</a></li>
            <li><a href="#">COG</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Usuarios y Permisos</a></li>
          </ul>
        </li>
        <li><a>Operacion Central</a></li>
        <li><a>Operacion Usuario</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <a class="navbar-brand">
          <img src="{{asset('img/user.png')}}" alt="logo" class="img-circle" style="width: 30px; height: 30px">
        </a>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Juan Perez<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Salir</a></li>
            <li><a href="#">Ver perfil</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>