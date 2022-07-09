<div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
    <div class="navbar-nav mr-auto">
        <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
        <a href="{{ route('product.list') }}" class="nav-item nav-link">Products</a>
        <a href="{{ route('product.detail') }}" class="nav-item nav-link">Product Detail</a>
        <a href="{{ route('cart') }}" class="nav-item nav-link">Cart</a>
        <a href="{{ route('checkout') }}" class="nav-item nav-link">Checkout</a>
        <a href="{{ route('my.account') }}" class="nav-item nav-link">My Account</a>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More Pages</a>
            <div class="dropdown-menu">
                <a href="{{ route('wishlist') }}" class="dropdown-item">Wishlist</a>
                <a href="{{ route('sesion') }}" class="dropdown-item">Login & Register</a>
                <a href="{{ route('contact') }}" class="dropdown-item">Contact Us</a>
            </div>
        </div>
    </div>
    <div class="navbar-nav ml-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
            <div class="dropdown-menu">
                <a href="#" class="dropdown-item">Login</a>
                <a href="#" class="dropdown-item">Register</a>
            </div>
        </div>
    </div>
</div>