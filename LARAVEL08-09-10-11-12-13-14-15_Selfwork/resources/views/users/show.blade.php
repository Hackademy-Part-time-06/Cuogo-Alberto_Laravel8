<x-main>
    <x-slot name="title">LIBRARY | Profile - {{ $user['name'] }}</x-slot>

    <div class="container">
        <div class="row min-vh-75 align-items-center">
            <div class="col-6 d-flex justify-content-center">
                <img class="card-img rounded shadow" style="clip-path: circle(50%)" src="@if (Auth::user()->gender == 'Female') {{ empty(Auth::user()->img) ? Storage::url('images/female-placeholder.jpg') : Storage::url(Auth::user()->img) }}
                    @elseif (Auth::user()->gender == 'Male') {{ empty(Auth::user()->img) ? Storage::url('images/male-placeholder.jpeg') : Storage::url(Auth::user()->img) }} @endif">
            </div>
            <div class="col-6 justify-content-center align-items-center">
                <a href="{{ route('users.edit', ['user_id' => Auth::user()->id]) }}" class="btn btn-warning me-md-2 position-absolute end-18 top-20">
                    <i class="bi bi-pencil-square"></i></a>

                <h1 class="text-center">- {{ $user->name }} -</h1>


                <ul class="list-group w-75 mx-auto my-4 shadow">

                    <li class="list-group-item py-3 px-5 book text-center">
                        <i class="bi bi-envelope-fill me-2"></i>{{ $user->email }}
                    </li>

                </ul>

                <ul class="list-group list-group-horizontal w-75 mx-auto my-4 shadow">

                    <li class="list-group-item w-50 py-3 px-5 book text-center">
                        <i class="bi bi-gender-@if (Auth::user()->gender == 'Female')female @elseif (Auth::user()->gender == 'Male')male @endif me-2"></i>{{ $user->gender }}
                    </li>

                    <li class="list-group-item w-50 py-3 px-5 book text-center">
                        <i class="bi bi-calendar2-heart-fill me-2"></i>{{ isset($user->birthday) ? $user->birthday->format('d F Y') : 'unknown' }}
                    </li>

                </ul>

                <ul class="list-group w-75 mx-auto shadow">

                    <li class="list-group-item py-3 px-5 book text-center">
                        <h5 class="text-dark">Biography</h5>

                        <p class="text-justify mt-3 text-dark text-opacity-50">
                            <em>{{ $user->description ?? 'No description entered' }}</em></p>
                    </li>

                </ul>
            </div>
        </div>
    </div>


    <div class="col-12 justify-content-center align-items-center mb-5">
        <h1 class="text-center my-5">Books created by {{ $user->name }}</h1>
        <div class="row g-3">
            @forelse ($user->books as $book)
                <div class="col-3">
                    <div class="card border-0 shadow">
                        <img class="card-img h-100"
                            src="{{ empty($book->img) ? Storage::url('\images\placeholder.jpg') : Storage::url($book->img) }}"
                            alt="{{ $book->title }}">
                        <div
                            class="card-img-overlay bg-dark bg-opacity-25 d-flex align-items-center justify-content-center">
                            <h5 class="card-title fw-bold fs-3 px-2 text-center text-light text-shadow">
                                {{ $book->title }}</h5>
                            <a href="{{ route('books.show', ['book' => $book['id']]) }}"
                                class="btn btn-lg btn-primary fw-bold shadow position-absolute bottom-5 start-25"><i
                                    class="bi bi-bookmark-heart me-2"></i>View Book</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center"><em>No books added to this author...</em></p>
            @endforelse
        </div>
    </div>

</x-main>
