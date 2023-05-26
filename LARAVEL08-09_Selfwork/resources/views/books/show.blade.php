<x-main>
    <x-slot name="title">LIBRARY | {{ $book->title }}</x-slot>

    <h1 class="text-center mb-5">{{ $book->title }}</h1>

    <div class="d-flex justify-content-center">
        <ul class="list-group">

                <li class="list-group-item py-4 px-5 book text-center">
                        <b>Author</b> - {{ $book->author }}
                </li>
                <li class="list-group-item py-4 px-5 book text-center">
                        <b>Year of Publication</b> - {{ $book->year }}
                </li>
                <li class="list-group-item py-4 px-5 book text-center">
                        <b>N° of Pages</b> - {{ $book->pages }} Pages
                </li>

        </ul>
    </div>

    <div class="d-flex justify-content-center mt-5">
        <a class="btn btn-warning text-dark fs-3 px-5" href="{{ route('books.index') }}"><i class="bi bi-house-heart-fill"></i> Homepage</a>
    </div>

</x-main>