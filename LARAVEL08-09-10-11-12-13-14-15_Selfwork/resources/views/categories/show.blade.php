<x-main>
    <x-slot name="title">LIBRARY | {{ $category->name }}</x-slot>

    <div class="container">
        <div class="row">
            <div class="col-12 justify-content-center align-items-center">
            </div>
            <div class="col-12 justify-content-center align-items-center mb-5">
                <h1 class="text-center my-5 fs-1">- {{ $category->name }} -</h1>
                <div class="row g-3">
                    @forelse ($category->books as $book)
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
                        <p class="text-center"><em>No books added to this category...</em></p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

</x-main>
