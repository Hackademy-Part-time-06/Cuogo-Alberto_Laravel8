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
            </ul>
        </div>
    </div>
</nav>