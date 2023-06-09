<x-main>
    <x-slot name="title">LIBRARY | {{ $book->title }}</x-slot>

    <div class="container">
        <div class="row">
            <div class="col-7 d-flex justify-content-center">
                <img class="card-img" src="{{empty($book->img) ? Storage::url('\images\placeholder.jpg') : Storage::url($book->img)}}" alt="{{ $book->title }}">
            </div>

            <div class="col-5 justify-content-center align-items-center">
                <h1 class="text-center my-5">{{ $book->title }}</h1>

                <ul class="list-group">

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

            </div>
        </div>
    </div>

</x-main>
