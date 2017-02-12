<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">MENU</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Twitter
            </a>
        </div>

        <div class="navbar-collapse collapse" id="app-navbar-collapse">
            <ul class="nav navbar navbar-nav navbar-right">
                @if (auth()->guest())
                    <li><a href="{{ url('register') }}">Inscription</a></li>
                    <li><a href="{{ url('login') }}">Connexion</a></li>
                @else
                    <li><a href="{{ url('tweets/create') }}">Nouveau tweet</a></li>

                    {{-- Formulaire de déconnexion --}}
                @endif
            </ul>
        </div>
    </div>
</nav>
