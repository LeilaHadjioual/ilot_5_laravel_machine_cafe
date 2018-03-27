<nav id="navbar" class="navbar navbar-expand-sm navbar-dark bg-dark ">
    <a class="navbar-brand" href="/">Machine à café</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">

            @if(Auth::user() && Auth::user()->admin)

                @if(Request::is("boissons*") || Request::is("recipes*"))
                    <li class="nav-item active">
                @else
                    <li class="nav-item">
                @endif
                        <a class="nav-link" href="/boissons">Boissons</a>
                    </li>
                @if(Request::is("ingredients*"))
                    <li class="nav-item active">
                @else
                    <li class="nav-item">
                @endif
                        <a class="nav-link" href="/ingredients">Ingredients</a>
                    </li>
                @if(Request::is("sales*"))
                    <li class="nav-item active">
                @else
                    <li class="nav-item">
                @endif
                        <a class="nav-link" href="/sales">Commandes</a>
                    </li>
                @if(Request::is("coins*"))
                    <li class="nav-item active">
                @else
                    <li class="nav-item">
                @endif
                        <a class="nav-link" href="/coins">Pièces</a>
                    </li>
            @endif
        </ul>
    </div>
    <ul class="nav navbar-nav navbar-right">
        @guest
            @if(Request::is("login*"))
                <li class="nav-item active">
            @else
                <li class="nav-item">
                    @endif
                    <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-sign-in fa-xs"></i> Login</a></li>

                @if(Request::is("register*"))
                    <li class="nav-item active">
                @else
                    <li class="nav-item">
                        @endif
                        <a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <button class="nav-link btn btn-dark dropdown-toggle" data-toggle="dropdown"
                                    type="button"
                                    aria-expanded="false"
                                    aria-haspopup="true">
                                <i class="fa fa-user fa-xs"></i> {{ Auth::user()->name }} <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="/home"">
                                <i class="fa fa-home fa-xs"></i> Home</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                            class="fa fa-sign-out fa-xs"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                            </ul>
                        </li>
            @endguest
    </ul>

</nav>