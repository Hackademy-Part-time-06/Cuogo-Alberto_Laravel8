<x-main>
    <x-slot name="title">LIBRARY | Edit Category</x-slot>

    <h1 class="text-center">EDIT CATEGORY</h1>


    <div class="container px-5">
        <div class=" rounded-3 py-4 px-4 px-md-5 mb-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">

                    <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" name="name" type="text"
                                value="{{ $category->name }}" placeholder="Name Category">
                            <label for="name">Category's Name</label>
                            @error('name')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div>
                            <button class="btn btn-primary btn-lg p-2 w-100" type="submit">Edit Category<i class="bi bi-pencil ms-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-main>
