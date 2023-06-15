<x-main>
    <x-slot name="title">LIBRARY | All Authors</x-slot>

    <h1 class="text-center mb-4">ALL AUTHORS</h1>


    <x-session />

    <div class="container w-50">
        <table class="table border mt-2">
            <thead class="text-light bg-dark">
                <tr>
                    <th scope="col" class="text-center col-2">#</th>
                    <th scope="col" class="col-2">FIRSTNAME</th>
                    <th scope="col" class="col-3">SURNAME</th>
                    <th scope="col" class="col-5"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($authors as $author)
                <tr class="align-middle">
                    <th scope="row" class="text-center">{{$author['id']}}</th>
                    <td>{{$author['firstname']}}</td>
                    <td>{{$author['surname']}}</td>
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{route('authors.show', ['author' => $author['id']])}}"
                                class="btn btn-primary me-md-2"><i class="bi bi-search"></i></a>

                            @auth

                            <a href="{{route('authors.edit', ['author' => $author['id']])}}"
                                class="btn btn-warning me-md-2"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{route('authors.destroy', compact('author'))}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="bi bi-x-circle"></i></button>
                            </form>
                        
                            @endauth

                        </div>


                    </td>
                </tr>
                @empty
                <td colspan="12" class="text-center mt-4 text-dark text-opacity-75"><em>No authors found...</em></td>
                @endforelse
            </tbody>
        </table>
    </div>

    @auth
        <div class="d-flex justify-content-center mt-5">
            <a href="{{ route('authors.create') }}" class="text-center w-50 bg-primary rounded text-light mb-4 px-5 py-3 fs-3 text-decoration-none">Add Author<i class="bi bi-person-plus ms-3"></i></a> 
        </div>
    @endauth
</x-main>