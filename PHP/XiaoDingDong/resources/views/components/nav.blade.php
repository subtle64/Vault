<nav class="navbar navbar-expand-lg bg-black">
    <div class="container-fluid">
        <a class="navbar-brand text-warning" href="/home">XiAO DiNG DoNG</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="/home">Home</a>
                </li>
                @auth
                @if(Auth::user()->is_admin == 0)
                <li class="nav-item">
                    <a class="nav-link text-white" href="/search">Search Food</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/cart">Cart</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link text-white" href="/menu/add">Add Food</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/search">Manage Food</a>
                </li>
                @endif
                @endauth
            </ul>
            @auth
            <ul class="navbar-nav profile">
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center text-warning" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome, {{ Auth::user()->username }}
                        @php
                        $profile = Auth::user()->img_path ?? 'default_profile.jpg';
                        @endphp
                        <img class="profile-image" src={{ asset("assets/profile/$profile") }} alt="">
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/profile">Profile</a></li>
                        @if(Auth::user()->is_admin == 0)
                        <li><a class="dropdown-item" href="/transactions">Transaction History</a></li>
                        @endif
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="btn dropdown-item" type="submit">Logout</button>
                        </form>
                    </ul>
                </li>
            </ul>
            @endauth
            @guest
            <ul class="navbar-nav">
                <a href="/login" class = "text-decoration-none">
                    <li class="nav-link text-white">Login</li>
                </a>
                <a href="/register" class = "text-decoration-none">
                    <li class="nav-link text-white">Register</li>
                </a>
            </ul>
            @endguest
        </div>
    </div>
</nav>