<x-main>
    <x-slot name="title">LIBRARY | Edit Book</x-slot>

    <h1 class="text-center">EDIT BOOK</h1>


    <div class="container px-5">
        <div class=" rounded-3 py-4 px-4 px-md-5 mb-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">

                    <form action="{{ route('books.update', ['book' => $book->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control" id="title" name="title" type="text"
                                value="{{ $book->title }}" placeholder="Title Book">
                            <label for="title">Book's Title</label>
                            @error('title')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" id="author_id" name="author_id">
                                @foreach ($authors as $author)
                                    <option @if ($book->author_id == $author->id) selected @endif
                                        value="{{ $author->id }}">
                                        {{ $author->firstname }} {{ $author->surname }}</option>
                                @endforeach
                            </select>
                            <label for="author_id">Author of the Book</label>
                            @error('author_id')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">

                            @foreach ($categories as $category)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" @checked($book->categories->contains($category->id)) {{-- @if ($book->categories->contains($category->id)) checked @endif --}}
                                        type="checkbox" name="categories[]" value="{{ $category->id }}"
                                        id="categories-{{ $category->id }}">
                                    <label class="form-check-label" for="categories-{{ $category->id }}">
                                        {{ $category->name }}
                                    </label>
                                </div>
                            @endforeach

                            @error('category_id')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="pages" name="pages" type="text"
                                value="{{ $book->pages }}" placeholder="Pages Book">
                            <label for="pages">N° of Pages in the Book</label>
                            @error('pages')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="year" name="year" type="text"
                                value="{{ $book->year }}" placeholder="Year Book">
                            <label for="year">Year of the Book</label>
                            @error('year')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form mb-3">
                            <label for="actual-img" class="fs-2 d-block text-center fw-bold mb-2">Actual Image</label>
                            <img class="card-img-top mb-5 mb-md-0"
                                src="{{ empty($book->img) ? Storage::url('\images\placeholder.jpg') : Storage::url($book->img) }}"
                                alt="{{ $book->title }}">
                        </div>

                        <div class="form mb-3">
                            <label for="img">Upload New Image of the Book</label>
                            <input class="form-control" id="img" name="img" type="file" value=""
                                placeholder="Image Book">
                            @error('img')
                                <span class="text-danger">
                                    {{ $message }}
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
                            <button class="btn btn-primary btn-lg p-2 w-100" type="submit">Edit Book<i
                                    class="bi bi-pencil ms-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-main>
