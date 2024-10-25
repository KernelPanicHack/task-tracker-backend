<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShelterResource;
use App\Models\Shelter;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

    }

    public function users()
    {
        return User::with('tasks')->get();
    }
}
