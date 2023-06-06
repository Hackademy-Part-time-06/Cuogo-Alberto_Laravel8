<x-main>
    <div class="container my-5">
        <h1 class="text-center mb-4">Log In</h1>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form class="p-5 shadow" action="{{ route('login') }}" method="POST">
                    @method('POST')
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="name" class="form-label">Username</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg px-5">Log In</button>
                    <a href="{{ route('register') }}" class="btn btn-outline-dark btn-lg px-5">Sign In</a>
                </form>
            </div>
        </div>
    </div>
</x-main>
