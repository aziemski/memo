<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function get(Request $req)
    {
        $users = User::all();
        return Response()->json($users);
    }
}
