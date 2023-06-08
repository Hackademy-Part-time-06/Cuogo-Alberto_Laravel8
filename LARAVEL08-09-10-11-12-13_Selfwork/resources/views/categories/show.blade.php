<x-main>
    <x-slot name="title">LIBRARY | {{ $category->name }}</x-slot>

    <div class="container">
        <div class="row">
            <div class="col-12 justify-content-center align-items-center">
                <h1 class="text-center my-5">Category n°{{ $category->id }}</h1>

                <ul class="list-group">

                    <li class="list-group-item py-4 px-5 book text-center">
                        <b>Name</b> - {{ $category->name }}
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
