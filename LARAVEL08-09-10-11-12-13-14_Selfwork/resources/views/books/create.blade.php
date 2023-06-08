<x-main>
    <x-slot name="title">LIBRARY | Add Book</x-slot>

    <h1 class="text-center">ADD BOOK</h1>


    <div class="container px-5">
        <div class=" rounded-3 py-4 px-4 px-md-5 mb-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">

                    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control" id="title" name="title" type="text"
                                value="{{ old('title') }}" placeholder="Title Book">
                            <label for="title">Book's Title</label>
                            @error('title')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="author" name="author" type="text"
                                value="{{ old('author') }}" placeholder="Author Book">
                            <label for="author">Author of the Book</label>
                            @error('author')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="pages" name="pages" type="text"
                                value="{{ old('pages') }}" placeholder="Pages Book">
                            <label for="pages">N° of Pages in the Book</label>
                            @error('pages')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="year" name="year" type="text"
                                value="{{ old('year') }}" placeholder="Year Book">
                            <label for="year">Year of the Book</label>
                            @error('year')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>

                        <div class="form mb-3">
                            <label for="img">Image of the Book</label>
                            <input class="form-control" id="img" name="img" type="file"
                                value="{{ old('img') }}" placeholder="Image Book">
                            @error('img')
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
                            <button class="btn btn-primary btn-lg p-2 w-100" type="submit">Add Book<i class="bi bi-bookmark-plus ms-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-main>
