<x-main>
    <x-slot name="title">LIBRARY | Edit Profile - {{ $user->name}}</x-slot>


    <div class="container my-5">
        <h1 class="text-center mb-4">Edit Profile</h1>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">

              <form action="{{ route('users.update', ['user_id' => Auth::user()->id]) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-floating mb-3">
                    <input class="form-control" id="name" name="name" type="text"
                        value="{{ $user->name}}" placeholder="Username" required>
                    <label for="name">Username</label>
                    @error('name')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" id="email" name="email" type="email"
                        value="{{ $user->email}}" placeholder="Email" required>
                    <label for="email">Email</label>
                    @error('email')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" id="gender" name="gender">
                        <option @if ($user->gender == 'Male') selected @endif value="Male">Male</option>
                        <option @if ($user->gender == 'Female') selected @endif value="Female">Female</option>
                    </select>
                    <label for="gender">Gender</label>
                    @error('gender')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" id="birthday" name="birthday" type="date"
                        value="{{ isset($user->birthday) ? $user->birthday->format('Y-m-d') : ''}}" placeholder="Birthday User">
                    <label for="birthday">User's Birthday</label>
                    @error('birthday')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                <div class="form mb-3">
                    <textarea class="form-control" id="description" name="description"
                        value="{{ $user->description}}" placeholder="Description of your Profile" rows="8"></textarea>
                    @error('description')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form mb-3">
                    <label for="actual-img" class="fs-2 d-block text-center fw-bold mb-2">Actual Image</label>
                    <img class="card-img-top mb-5 mb-md-0"
                        src="@if (Auth::user()->gender == 'Female') 
                        {{empty(Auth::user()->img) ? Storage::url('images/female-placeholder.jpg') : Storage::url(Auth::user()->img)}}
                    @elseif (Auth::user()->gender == 'Male') 
                        {{empty(Auth::user()->img) ? Storage::url('images/male-placeholder.jpeg') : Storage::url(Auth::user()->img)}}
                    @endif"
                        alt="">
                </div>

                <div class="form mb-3">
                    <label for="img">Upload New Image of your Profile</label>
                    <input class="form-control" id="img" name="img" type="file" value=""
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

                <div>
                    <button class="btn btn-primary btn-lg p-2 w-100" type="submit">Edit Profile<i
                            class="bi bi-pencil ms-2"></i></button>
                </div>
            </form>            </div>
        </div>
    </div>



</x-main>