<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img class="logotipo" src="/images/logo.svg" alt=""/>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @if (Auth::user()->type == 'admin')
                    <li><a href="{{ url('ospanel') }}">Inicio</a></li>
                    <li><a href="{{ route('ospanel.users.index') }}">Listar usuarios</a></li>
                    <li><a href="{{ route('ospanel.users.create') }}">Nuevo usuario</a></li>
                @endif
                @if (Auth::user()->type == 'supervisor')
                    <li><a href="{{ url('ospanel') }}">Inicio</a></li>
                    <li><a href="{{ route('ospanel.users.index') }}">Listar técnicos</a></li>
                @endif
                @if (Auth::user()->type == 'tecnico')
                    <li><a href="{{ url('ospanel') }}">Inicio</a></li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Entrar</a></li>
                    <!-- <li><a href="#{{ url('/auth/register') }}">Register</a></li> -->
                @else
                    <li><a href="{{ url('/auth/logout') }}">Salir</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>