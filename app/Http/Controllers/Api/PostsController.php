<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

//        $user->assignRole('writer');
        $string = "";

        if ($user->hasRole('writer')){
            $string .= "user is writer \n";
        }

//        $user->givePermissionTo('update title');

        if ($user->can('update title')){
            $string .= 'user can update title';
        }

        return response([
            'message' => $string
        ]);

    }
}
