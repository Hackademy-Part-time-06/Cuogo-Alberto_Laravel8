<x-main>
    <x-slot name="title">LIBRARY | {{ $category->name }}</x-slot>

    <div class="container">
        <div class="row">
            <div class="col-12 justify-content-center align-items-center">
                <h1 class="text-center my-5">Category n°{{ $category->id }}</h1>

                <ul class="list-group w-50 mx-auto">

                    <li class="list-group-item py-4 px-5 book text-center">
                        <b>Name</b> - {{ $category->name }}
                    </li>

                </ul>
            </div>
        </div>
    </div>

</x-main>
