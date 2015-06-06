<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Eistel</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @if (Auth::user()->type == 'admin')
                <li><a href="{{ url('clientes') }}">Dashboard</a></li>
                <li><a href="{{ url('admin/users/create') }}">Nuevo técnico</a></li>
                <li><a href="{{ url('admin/clientes/create') }}">Nuevo cliente</a></li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    <!-- <li><a href="#{{ url('/auth/register') }}">Register</a></li> -->
                @else
                    <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
