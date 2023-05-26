<x-main>
    <x-slot name="title">LIBRARY | All Books</x-slot>

    <h1 class="text-center mb-4">ALL BOOKS</h1>


    @if (session('success')) 
        <div class="d-flex justify-content-center">
            <div class="text-center w-50 bg-success rounded text-light mb-4 px-5 py-3 fs-3 fw-bold">{{session('success')}}</div> 
        </div>
    @endif

    <div class="d-flex justify-content-center">
        <ul id="books" class="list-group">
            @foreach ($books as $book)
                <li class="list-group-item py-4 px-5 book text-center">
                    <a class="text-dark text-decoration-none" href="{{ route('books.show', str_replace(' ', '-', $book['id'])) }}">
                        <b>{{ $book['title'] }}</b> - {{ $book['author'] }} <i class="bi bi-search ms-2"></i>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</x-main>