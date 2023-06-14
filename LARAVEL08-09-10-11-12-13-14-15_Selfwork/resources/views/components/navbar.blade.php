<nav class="navbar navbar-expand-lg navbar-dark bg-black sticky-top">
    <div class="container px-5 align-items-center">
        <a class="navbar-brand" href="{{ Route('homepage') }}"><img src="\img\book_favicon.ico" alt=""
                height="40rem"> Library</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @foreach ($links as $link)
                    <li class="nav-item me-3">
                        <a class="nav-link @if (Route::currentRouteName() == $link['uri']) active @endif"
                            href="{{ route($link['uri']) }}">{{ $link['label'] }} <i
                                class="bi {{ $link['icon'] }}@if (Route::currentRouteName() == $link['uri']) -fill @endif"></i></a>
                    </li>
                @endforeach
                

                @auth
                    <li id="profile" class="nav-item dropdown fs-5 pe-3">
                        <a class="nav-link dropdown-toggle text-white fw-semibold" href="" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Hi, {{ Auth::user()->name }} <img class="card-img max-vh-3 ms-0 rounded-circle" style="clip-path: circle(50%)"
                            src="@if (Auth::user()->gender == 'Female') 
                                    {{empty(Auth::user()->img) ? Storage::url('images/female-placeholder.jpg') : Storage::url(Auth::user()->img)}}
                                @elseif (Auth::user()->gender == 'Male') 
                                    {{empty(Auth::user()->img) ? Storage::url('images/male-placeholder.jpeg') : Storage::url(Auth::user()->img)}}
                                @endif"
                            alt="">
                        </a>
                        <ul class="dropdown-menu w-110">
                            <li><a class="dropdown-item fw-bold d-flex justify-content-between" href="{{ route('users.show', ['user_id' => Auth::user()->id]) }}">
                                My Profile <i class="bi bi-person-circle"></i></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('books.create') }}"><i
                                        class="bi bi-bookmark-plus me-2"></i>Add Book</a></li>
                            <li><a class="dropdown-item" href="{{ route('authors.create') }}"><i
                                        class="bi bi-person-plus me-2"></i>Add Author</a></li>
                            <li><a class="dropdown-item" href="{{ route('categories.create') }}"><i
                                        class="bi bi-folder-plus me-2"></i>Add Category</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="px-2">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger w-100 fw-bold"
                                        onclick="event.preventDefault(); this.closest('form').submit();">Log Out</button>
                                </form>
                            </li>
                        </ul>
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
