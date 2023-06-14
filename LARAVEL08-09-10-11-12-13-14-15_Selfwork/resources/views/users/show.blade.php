<x-main>
    <x-slot name="title">LIBRARY | Profile - {{ $user['name'] }}</x-slot>

    <a href="{{ route('users.edit', ['user_id' => Auth::user()->id]) }}" class="btn btn-warning me-md-2"><i
            class="bi bi-pencil-square"></i></a>

    <h1>{{ $user->name }}</h1>
    <h1>{{ $user->email }}</h1>
    <h1>{{ $user->gender }}</h1>
    <h1>Data di nascita -> {{ isset($user->birthday) ? $user->birthday->format('d F Y') : 'unknown' }}</h1>
    <h1>Descrizione -> {{ $user->description }}</h1>
    <img
        src="@if (Auth::user()->gender == 'Female') {{ empty(Auth::user()->img) ? Storage::url('images/female-placeholder.jpg') : Storage::url(Auth::user()->img) }}
@elseif (Auth::user()->gender == 'Male') 
  {{ empty(Auth::user()->img) ? Storage::url('images/male-placeholder.jpeg') : Storage::url(Auth::user()->img) }} @endif">

    <div class="col-12 justify-content-center align-items-center mb-5">
        <h1 class="text-center my-5">Books created by this Profile</h1>
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
