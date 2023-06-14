<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('homepage');
    }

    public function homepage()
    {
        return view('homepage');
    }

    public function show($user_id)
    {
        if (Auth::user()->id == $user_id) {
            $user = User::findOrFail($user_id);
        }
        else {
            abort('404');
        }

        return view('users.show', ['user' => $user]);
    }

    public function edit($user_id)
    {
        if (Auth::user()->id == $user_id) {
            $user = User::findOrFail($user_id);
        }
        else {
            abort('404');
        }

        return view('users.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, User $user) {
        $path_image = Auth::user()->img;

        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $path_name = $request->file('img')->getClientOriginalName();
            $path_image = $request->file('img')->storeAs('public/images/profile', $path_name);
        }

        $user->update([
            'name' =>$request->name,
            'img' =>$path_image,
            'email' =>$request->email,
            'password' =>$request->password,
            'gender' =>$request->gender,
            'birthday' =>$request->birthday,    
            'description' =>$request->description,
        ]);

        return redirect()->route('users.show', ['user_id' => Auth::user()->id]);
    }
}
