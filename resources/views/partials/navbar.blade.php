<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #add8e6;">
    <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">
    Blog System
</a>

<ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">All Posts</a>
    </li>
    @auth
        <li class="nav-item">
            <a class="nav-link" href="{{ route('posts.myposts') }}">My Posts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('profiles.show', Auth::user()->id) }}">My Profile</a>
        </li>
    @endauth
</ul>

            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item">
                        <span class="navbar-text me-3">Hello, {{ Auth::user()->Name }}</span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-link nav-link" type="submit">Logout</button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>