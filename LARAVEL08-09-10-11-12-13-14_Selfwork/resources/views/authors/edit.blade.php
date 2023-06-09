<x-main>
    <x-slot name="title">LIBRARY | Edit Author</x-slot>

    <h1 class="text-center">EDIT AUTHOR</h1>


    <div class="container px-5">
        <div class=" rounded-3 py-4 px-4 px-md-5 mb-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">

                    <form action="{{ route('authors.update', ['author' => $author->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control" id="firstname" name="firstname" type="text"
                                value="{{ $author->firstname }}" placeholder="Firstname Author">
                            <label for="firstname">Author's Firstname</label>
                            @error('firstname')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="surname" name="surname" type="text"
                                value="{{ $author->surname }}" placeholder="Surname Author">
                            <label for="surname">Author's Surname</label>
                            @error('surname')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="birthday" name="birthday" type="date"
                                value="{{ isset($author->birthday) ? $author->birthday->format('Y-m-d') : ''}}" placeholder="Birthday Author">
                            <label for="birthday">Author's Birthday</label>
                            @error('birthday')
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
                            <button class="btn btn-primary btn-lg p-2 w-100" type="submit">Edit Author<i class="bi bi-pencil ms-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-main>
