<x-main>
    <x-slot name="title">LIBRARY | {{ $author->firstname }} {{ $author->surname }}</x-slot>

    <div class="container">
        <div class="row">
            <div class="col-12 justify-content-center align-items-center">
                <h1 class="text-center my-5">- {{ $author->firstname }} {{ $author->surname }} -</h1>

                <ul class="list-group w-50 mx-auto">

                    <li class="list-group-item py-4 px-5 book text-center">
                        <b><i class="bi bi-calendar2-heart-fill"></i>
                        {{ isset($author->birthday) ? $author->birthday->format('d F Y') : 'unknown' }}</b>
                    </li>

                </ul>
            </div>
            <div class="col-12 justify-content-center align-items-center mb-5">
                <h1 class="text-center my-5">Books of the Author</h1>
                <div class="row g-3">
                    @forelse ($author->books as $book)
                        <div class="col-3">
                            <div class="card border-0 shadow">
                                <img class="card-img h-100" src="{{ empty($book->img) ? Storage::url('\images\placeholder.jpg') : Storage::url($book->img) }}" alt="{{ $book->title }}">
                                <div class="card-img-overlay bg-dark bg-opacity-25 d-flex align-items-center justify-content-center">
                                    <h5 class="card-title fw-bold fs-3 px-2 text-center text-light text-shadow">{{ $book->title }}</h5>
                                    <a href="{{ route('books.show', ['book' => $book['id']]) }}"
                                        class="btn btn-lg btn-primary fw-bold shadow position-absolute bottom-5 start-25"><i class="bi bi-bookmark-heart me-2"></i>View Book</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center"><em>No books added to this author...</em></p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

</x-main>
