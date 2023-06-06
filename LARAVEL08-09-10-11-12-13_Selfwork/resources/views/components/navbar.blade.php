<nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container px-5 align-items-center">
        <a class="navbar-brand" href="{{ Route('books.index')}}"><img src="\img\book_favicon.ico" alt="" height="40rem"> Library</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @foreach ($links as $link)
                <li class="nav-item me-3">
                    <a class="nav-link @if (Route::currentRouteName() == $link['uri']) active @endif"
                        href="{{ route($link['uri']) }}">{{$link['label']}} <i class="bi {{$link["icon"]}}@if (Route::currentRouteName() == $link['uri'])-fill @endif"></i></a>
                </li>
                @endforeach

                @auth
                <li class="nav-item fs-5 pt-1 pe-3">
                    <p class="text-white">Hi, {{Auth::user()->name}}</p>
                </li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</button>
                </form>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn btn-light px-4 fw-bold">Log In</a>
                </li>
                <li class="nav-item  ms-2">
                    <a href="{{ route('register') }}" class="btn btn-primary px-4 fw-bold">Register</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>