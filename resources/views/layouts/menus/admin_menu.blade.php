<li class="nav-item pcoded-menu-caption">
    <label>Menu</label>
</li>
<li class="nav-item pcoded-hasmenu">
    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user-plus"></i></span><span class="pcoded-mtext">Administrar usuarios</span></a>
    <ul class="pcoded-submenu">
        <li><a href="{{ route('admin.users') }}">Administrar usuarios</a></li>
        <li><a href="{{ route('user.create') }}">Crear usuario</a></li>
        <li><a href="{{ route('assign.profile') }}">Asignar perfil</a></li>
        <li><a href="{{ route('create.profile') }}">Crear perfil</a></li>
        <li><a href="{{ route('admin.profile') }}">Administrar perfiles</a></li>
    </ul>
</li>
<li class="nav-item pcoded-hasmenu">
    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user-check"></i></span><span class="pcoded-mtext">Control de proveedores</span></a>
    <ul class="pcoded-submenu">
        <li><a href="">Condiciones acuerdo comercial</a></li>
        <li><a href="">Administrar mis productos</a></li>
        <li><a href="">Políticas de envio y devoluciones</a></li>
    </ul>
</li>
<li class="nav-item">
    <a href="{{ route('password.change') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span class="pcoded-mtext">Cambiar contraseña</span></a>
</li>
