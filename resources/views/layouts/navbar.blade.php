<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <img src="{{asset('img/jal00.svg')}}" alt="logo" class="img-responsive" style="width: 40px; height: 30px">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                @auth
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuracion<span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="dropdown-submenu">
                            <a href="#" class="test" tabindex="-1">Estructura Administratiba
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('up.index')}}" tabindex="-1">Unidad Presupuestal</a></li>
                                <li><a href="{{route('ur.index')}}" tabindex="-1">Unidad Responsable</a></li>
                                <li><a href="{{route('ueg.index')}}" tabindex="-1">Unidad Ejecutora del Gasto</a></li>
                                <li><a href="{{route('municipio.index')}}" tabindex="-1">Municipios</a></li>
                                <li><a href="{{route('region.index')}}" tabindex="-1">Regiones</a></li>
                                <li><a href="{{route('escuela.index')}}" tabindex="-1">UOG</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('tpg.index')}}">Tipo de Programa General</a></li>
                        <li><a href="#">COG</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Usuarios y Permisos</a></li>
                    </ul>
                </li>
                <li><a>Operacion Central</a></li>
                <li><a>Operacion Usuario</a></li>
                @endauth
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
                @guest
                    <li><a href="#" @click="login">Login</a></li>
                    <li><a href="#" @click="register">Register</a></li>
                @else
                    <a class="navbar-brand">
                        <img src="{{asset('img/user.png')}}" alt="logo" class="img-circle" style="width: 30px; height: 30px">
                    </a>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->nombre.' '.Auth::user()->apellido_paterno}}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('logout')}}">Salir</a></li>
                            <li><a href="#">Ver perfil</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                    <a href="#" id="año" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@{{año_actual}}
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li v-for="año in años">
                            <a href="#" @click="changeYear(año)">@{{año}}</a>
                        </li>
                    </ul>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>