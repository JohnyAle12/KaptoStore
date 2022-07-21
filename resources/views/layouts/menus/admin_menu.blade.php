<li class="nav-item pcoded-menu-caption">
    <label>Menu</label>
</li>
@foreach (getTransactionsCategories() as $category => $transactions)
    <li class="nav-item pcoded-hasmenu">
        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user-check"></i></span><span class="pcoded-mtext">{{ $category }}</span></a>
        <ul class="pcoded-submenu">
            @foreach ($transactions as $transaction)
                <li><a href="{{ route($transaction->route) ?? '#' }}">{{ $transaction->name }}</a></li>
            @endforeach
        </ul>
    </li>
@endforeach
<li class="nav-item">
    <a href="{{ route('password.change') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span class="pcoded-mtext">Cambiar contraseña</span></a>
</li>
