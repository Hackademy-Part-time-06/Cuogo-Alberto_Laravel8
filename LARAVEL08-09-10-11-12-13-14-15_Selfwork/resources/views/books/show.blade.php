<x-main>
    <x-slot name="title">LIBRARY | {{ $book->title }}</x-slot>

    <div class="container">
        <div class="row min-vh-75 align-items-center">
            <div class="col-7 d-flex justify-content-center">
                <img class="card-img" src="{{empty($book->img) ? Storage::url('\images\placeholder.jpg') : Storage::url($book->img)}}" alt="{{ $book->title }}">
            </div>

            <div class="col-5 justify-content-center align-items-center">
                <h1 class="text-center">{{ $book->title }}</h1>

                <button class="btn btn-dark fw-semibold shadow my-4 d-block mx-auto"><i class="bi bi-tags me-2"></i>Category</button>


                <ul class="list-group shadow">

                    <li class="list-group-item py-4 px-5 book text-center">
                        <b>Author</b> - {{$book->author->firstname}} {{$book->author->surname}}
                        <a href="{{route('authors.show', ['author' => $book['author_id']])}}"><i class="bi bi-search text-dark ms-2"></i></a>
                    </li>
                    <li class="list-group-item py-4 px-5 book text-center">
                        <b>Year of Publication</b> - {{ $book->year }}
                    </li>
                    <li class="list-group-item py-4 px-5 book text-center">
                        <b>N° of Pages</b> - {{ $book->pages }} Pages
                    </li>

                </ul>

                <p class="text-center mt-4 text-dark text-opacity-50"><em>created by {{$book->user->name ?? 'Unknown'}}</em></p>

            </div>
        </div>
    </div>

</x-main>
