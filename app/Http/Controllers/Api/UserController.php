<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

    }

    public function users()
    {
        $users = User::all();
        return response([
            'user' => $users
        ]);
    }
}
