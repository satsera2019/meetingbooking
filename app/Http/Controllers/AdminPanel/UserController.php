<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin-panel.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin-panel.users.create');
    }

    public function store(CreateUserRequest $request)
    {
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user',
        ]);
        return redirect()->route('admin-panel.users.index')->with(['success', "User created successfully."]);
    }

    public function edit(User $user)
    {
        return view('admin-panel.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $request->validate([
            'email' => 'unique:users,email,' . $user->id
        ]);
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email ?? $user->email,
            'role' => $request->role,
            'comment' => $request->comment,
        ]);

        if ($request->password) {
            $user->update([
                'password' => bcrypt($request->password)
            ]);
        }

        return redirect()->route('admin-panel.users.index')->with(['success', "User updated successfully."]);
    }
}
