<x-main>
    <x-slot name="title">LIBRARY | {{ $book->title }}</x-slot>

    <div class="container">
        <div class="row">
            <div class="col-7">
                <img class="card-img" src="{{empty($book->img) ? Storage::url('\images\placeholder.jpg') : Storage::url($book->img)}}" alt="{{ $book->title }}">
            </div>

            <div class="col-5 justify-content-center align-items-center">
                <h1 class="text-center my-5">{{ $book->title }}</h1>

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

                <div class="d-flex justify-content-center mt-5">
                    <a class="btn btn-warning text-dark fs-3 px-5" href="{{ route('homepage') }}"><i
                            class="bi bi-house-heart-fill"></i> Homepage</a>
                </div>
            </div>
        </div>
    </div>

</x-main>
