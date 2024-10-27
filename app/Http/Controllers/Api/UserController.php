<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\ShelterResource;
use App\Models\Shelter;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users()
    {
        return User::with('tasks', 'roles')->get();

    }

    public function show(string $user)
    {
        $user = User::where('id', $user)->with(['tasks'])->first();
        $roles = $user->getRoleNames();
        return response([
            'users'=> $user->only(['id', 'name', 'surname', 'patronymic', 'specialization', 'email', 'created_at', 'updated_at', 'tasks']),
            'roles' => $roles,
        ]);
    }

    public function update(UserRequest $request, string $userId)
    {
        $fullName = $request->fullName;
        $parts = preg_split('/[\s-]+/', $fullName);
        $parsed = [
            'surname' => $parts[0] ?? null,
            'name' => $parts[1] ?? null,
            'patronymic' => $parts[2] ?? null,
        ];

        $user = User::where('id', $userId);
        $user->update([
            'specialization' => $request->specialization,
            'name' => $parsed['name'],
            'surname' => $parsed['surname'],
            'patronymic' => $parsed['patronymic'],
        ]);
        return response([
            'message' => 'user successfully updated'
        ]);
    }

    public function delete(string $userId)
    {
        $user = User::where('id', $userId);
        $user->delete();

        return response([
            'message' => 'User removed'
        ]);
    }

    public function abra()
    {
        $data = [];
        $users = User::all();
        foreach ($users as $user){
            if ($user->hasRole('user')){
                $data[] = $user;
            }
        }
        return $data;
    }
}
