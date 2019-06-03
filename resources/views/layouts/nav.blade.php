<nav class="navbar navbar-expand-md navbar-light shadow-sm">
    <div class="container">
        <a id="home" class="nav-link text-light" href="{{ route('home') }}">
            Home
        </a>
        <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul id="left-side" class="navbar-nav mr-auto">
                <li id="search-li" class="w-75 mb-2">
                    <form action="/posts/search" method="post">
                        @csrf
                        <input id="search" type="search" name="serchTerm" class="form-control pt-1">
                        <input type="submit" value="search" class="btn btn-primary">
                    </form>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul id="right-side" class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li id="new-post" class="nav-item dropdown mr-4">
                        <a class="btn btn-primary" href="{{ url('/posts/create') }}">
                            New Post
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-dark" href="/user/settings">
                                profile
                            </a>
                            <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>