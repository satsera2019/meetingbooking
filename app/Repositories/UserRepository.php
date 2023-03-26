<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function getUsersWithFilters($request)
    {
        $query = User::query();
        if ($request->has('first_name') and $request->get('first_name') !== null) {
            $query->where('first_name', $request->get('first_name'));
        }
        if ($request->has('last_name') and $request->get('last_name') !== null) {
            $query->where('last_name', $request->get('last_name'));
        }
        if ($request->has('email') and $request->get('email') !== null) {
            $query->where('email', $request->get('email'));
        }
        return $query->orderBy('id', 'DESC')->paginate(15);
    }

    public function createUser($request)
    {
        return User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => 'user',
        ]);
    }

    public function updateUser($request, $user)
    {
        return $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email ?? $user->email,
            'role' => $request->role,
            'comment' => $request->comment,
        ]);
    }

    public function checkUserValid(int $user_id, string $password)
    {
        $user = User::where('id', $user_id)->first();
        if (!$user) {
            return ["success" => false, "message" => "User not found."];
        }
        if (!Hash::check($password, $user->password)) {
            return ["success" => false, "message" => "Incorrect password."];
        }
        return ["success" => true, "message" => "User data is valid."];
    }
}
