<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('home.index') }}" class="nav-link px-2">Home</a></li>
                @auth
                    @role('admin')
                        <li><a href="{{ route('users.index') }}" class="nav-link px-2">Users</a></li>
                        <li><a href="{{ route('roles.index') }}" class="nav-link px-2">Roles</a></li>
                    @endrole
                    <li><a href="{{ route('products.index') }}" class="nav-link px-2">Products</a></li>
                @endauth
            </ul>

            @auth
                {{ auth()->user()->name }}&nbsp;
                <div class="text-end">
                    <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
                </div>
            @endauth

            @guest
                <div class="text-end">
                    <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
                    <a href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a>
                </div>
            @endguest
        </div>
    </div>
</header>

