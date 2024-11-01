<nav class="navbar navbar-expand-lg navbar-light {{ Route::currentRouteName() == 'forum' ? 'bg-primary' : '' }}" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ route('index') }}">Medellín <span class="text-info">Hoy</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav align-items-baseline ms-auto py-4 py-lg-0">
                <li class="nav-item mx-2"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('index') }}">Inicio</a></li>
                <li class="nav-item mx-2"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('forum') }}">Forum</a></li>
                <li class="nav-item mx-2"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('contact') }}">Contáctenos</a></li>
                
                @if (Route::has('login'))
                    @auth
                        @if (Auth::user()->hasRole('admin'))
                            <li class="nav-item mx-2"><a class="nav-link px-lg-3 py-1 py-lg-1 btn btn-light text-info rounded" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        @endif
                        <li class="nav-item mx-2">
                            <form action="{{ route('logout') }}" method="POST" style="display:inline;" class="py-1 py-lg-1">
                                @csrf
                                <li class="nav-item mx-2"><button type="submit" class="nav-link px-lg-3 py-1 py-lg-1 btn btn-light text-info rounded">Cerrar Sesión</button></li>
                            </form>
                        </li>
                    @else
                        <li class="nav-item mx-2"><a class="nav-link px-lg-3 py-1 py-lg-1 btn btn-light text-info rounded" href="{{ route('login') }}">Iniciar Sesión</a></li>
                        <li class="nav-item mx-2"><a class="nav-link px-lg-3 py-1 py-lg-1 btn btn-info rounded" href="{{ route('register') }}">Registro</a></li>
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
