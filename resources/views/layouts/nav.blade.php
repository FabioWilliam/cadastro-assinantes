<nav class="navbar navbar-expand fixed-top navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Editora Virtual</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>
    @auth
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('assinantes.index') }}">Assinantes</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('revistas.index') }}">Revistas</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('assinaturas.index') }}">Assinaturas</a>
            </li>
        </ul>
    @endauth
    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Entrar</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Cadastre-se</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
</nav>
