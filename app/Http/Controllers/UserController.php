<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function allShow()
    {
        $users = User::all();

        return Response()->json($users);
    }

    public function meShow()
    {
        $userId = Auth::id();
        $user = User::find($userId);

        return view('users.profile', compact('user'));
    }
}
