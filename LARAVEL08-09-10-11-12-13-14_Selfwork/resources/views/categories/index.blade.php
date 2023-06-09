<x-main>
    <x-slot name="title">LIBRARY | All Categories</x-slot>

    <h1 class="text-center mb-4">ALL CATEGORIES</h1>


    <x-session />

    <div class="container w-50">
        <table class="table border mt-2">
            <thead class="text-light bg-dark">
                <tr>
                    <th scope="col" class="text-center col-2">#</th>
                    <th scope="col" class="col-5">Name</th>
                    <th scope="col" class="col-5"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                <tr class="align-middle">
                    <th scope="row" class="text-center">{{$category['id']}}</th>
                    <td>{{$category['name']}}</td>
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                            @auth
                            <a href="{{route('categories.show', ['category' => $category['id']])}}"
                                class="btn btn-primary me-md-2"><i class="bi bi-search"></i></a>

                            <a href="{{route('categories.edit', ['category' => $category['id']])}}"
                                class="btn btn-warning me-md-2"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{route('categories.destroy', compact('category'))}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="bi bi-x-circle"></i></button>
                            </form>
                        
                            @endauth

                        </div>


                    </td>
                </tr>
                @empty
                <tr colspan="4"> </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @auth
        <div class="d-flex justify-content-center mt-5">
            <a href="{{ route('categories.create') }}" class="text-center w-50 bg-primary rounded text-light mb-4 px-5 py-3 fs-3 text-decoration-none">Add Category<i class="bi bi-folder-plus ms-3"></i></a> 
        </div>
    @endauth
</x-main>