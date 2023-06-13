<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homepage()
    {
        return view('homepage');
    }

    public function profile($user_id)
    {
        $user = User::findOrFail($user_id);

        return view('profile', ['user' => $user]);
    }
}
