<ul class="nav">
    <li class="nav-item active">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-5 pt-3 mb-3 d-flex">
            <div class="image">

                <img @if (Auth::user()->imagen != 'default') src="{{ asset('storage/images/avatar/' . Auth::user()->imagen) }}"
                @else src="{{ asset('assets/img/default-avatar.png') }}" @endif
                class="img-circle elevation-2" alt="User Image">

            </div>
            <div class="info">

                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
         

            </div>
        </div>
        <a class="nav-link" href="javascript:;">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
        </a>
    </li>
    @can('admin.all')
    <li>
        <a class="nav-link" href="{!! route('home.index') !!}">Usuarios <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{!! route('roles.index') !!}">Roles</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{!! route('permisos.index') !!}">Permisos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{!! route('log') !!}">Logs</a>
    </li>
    @endcan
    <li class="nav-item">
        <a class="nav-link" href="{!! route('articulos.index') !!}">Articulos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{!! route('categorias.index') !!}">Categorias</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{!! route('eventos.index') !!}">Eventos</a>
    </li>
    <!-- your sidebar here -->
</ul>