<x-main>
    <x-slot name="title">LIBRARY | Register</x-slot>

    <div class="container my-5">
        <h1 class="text-center mb-4">Registration</h1>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form class="p-5 shadow" action="{{ route('register') }}" method="POST">
                    @method('POST')
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="Username" required>
                        <label for="name" class="form-label">Username</label>
                        @error('name')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Email" required>
                        <label for="email" class="form-label">Email</label>
                        @error('email')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}" placeholder="Password" required>
                        <label for="password" class="form-label">Password</label>
                        @error('password')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" value="{{ old('confirm_password') }}" placeholder="Confirm Password" required>
                        <label for="password_confirmation" class="form-label">Confirm password</label>
                        @error('password_confirmation')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" id="gender" name="gender" required>
                            <option selected value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <label for="gender">Gender</label>
                        @error('gender')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="birthday" name="birthday" type="date" value="{{ old('birthday') }}" placeholder="Birthday User">
                        <label for="birthday">User's Birthday</label>
                        @error('birthday')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                        @enderror
                    </div>

                    <div class="form mb-3">
                        <textarea class="form-control" id="description" name="description"
                            value="{{ old('description') }}" placeholder="Description of your Profile" rows="8"></textarea>
                        @error('description')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form mb-3">
                        <label for="img">Image of your Profile</label>
                        <input class="form-control" id="img" name="img" type="file" value="{{ old('img') }}"
                            placeholder="Image User">
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

                    <button type="submit" class="btn btn-primary btn-lg px-5">Sign In</button>
                    <a href="{{ route('login') }}" class="btn btn-outline-dark btn-lg px-5">Log In</a>
                </form>
            </div>
        </div>
    </div>
</x-main>
