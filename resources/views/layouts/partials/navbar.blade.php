<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
            </a>
            @guest
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{route('home.index')}}" class="nav-link px-2 text-white">Delta Holding</a></li>
                    <li><a href="{{route('home.agrar')}}" class="nav-link px-2 text-white">Agrar</a></li>
                    <li><a href="{{route('home.dts')}}" class="nav-link px-2 text-white">DTS</a></li>
                </ul>
            @endguest

            @auth
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{route('legal-entities.index')}}" class="nav-link px-2 text-white">Pravna lica</a></li>
                    <li><a href="{{route('positions.index')}}" class="nav-link px-2 text-white">Pozicije</a></li>
                    <li><a href="{{route('roles.index')}}" class="nav-link px-2 text-white">Role</a></li>
                    <li><a href="{{route('users.index')}}" class="nav-link px-2 text-white">Korisnici</a></li>
                </ul>
            @endauth

            @auth
                {{auth()->user()->name}}, {{auth()->user()->company}}
                <div class="text-end">
                    <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
                </div>
            @endauth

            @guest
                <div class="text-end">
                    <a href="{{ route('login.show') }}" class="btn btn-outline-light me-2">Login</a>
                    <a href="{{ route('register.show') }}" class="btn btn-warning">Sign-up</a>
                </div>
            @endguest
        </div>
    </div>
</header>
