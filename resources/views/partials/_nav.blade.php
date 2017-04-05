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
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ '@' . auth()->user()->name }} <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="{{ url('users/' . auth()->user()->id) }}">Mon profil</a></li>
                            <li><a href="{{ url('users/' . auth()->user()->id . '/edit') }}">Modifier mon profil</a></li>
                            <li><a href="{{ url('logout') }}">Déconnexion</a></li>
                          </ul>
                    </li>

                    @if (auth()->user()->isAdmin())
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="{{ url('tweets/') }}">Tweets</a></li>
                          </ul>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</nav>
