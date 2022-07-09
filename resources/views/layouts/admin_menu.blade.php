<li class="nav-item pcoded-menu-caption">
    <label>Menu</label>
</li>
<li class="nav-item pcoded-hasmenu">
    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user-plus"></i></span><span class="pcoded-mtext">Administrar usuarios</span></a>
    <ul class="pcoded-submenu">
        <li><a href="{{ route('user.create') }}">Crear usuario</a></li>
        <li><a href="{{ route('admin.users') }}">Ver usuarios</a></li>
    </ul>
</li>
<li class="nav-item pcoded-hasmenu">
    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user-check"></i></span><span class="pcoded-mtext">Administrar roles</span></a>
    <ul class="pcoded-submenu">
        <li><a href="{{ route('user.create') }}">Crear usuario</a></li>
        <li><a href="{{ route('admin.users') }}">Ver usuarios</a></li>
    </ul>
</li>
<li class="nav-item">
    <a href="{{ route('password.change') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span class="pcoded-mtext">Cambiar contraseña</span></a>
</li>
