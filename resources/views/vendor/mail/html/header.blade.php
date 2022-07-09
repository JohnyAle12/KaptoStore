<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (file_exists(config('app.url').'/img/logo-trades1.jpg')) <!-- No ingresa -->
                <img src="{{ config('app.url').'/img/logo-trades1.jpg' }}" class="logo" alt="Trading Stock BTC Logo">
                <!-- https://laravel.com/img/notification-logo.png -->
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
