<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Booking;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users =  $this->userRepository->getUsersWithFilters($request);
        return view('admin-panel.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin-panel.users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $validatedData = $request->validated();
        $this->userRepository->createUser($validatedData);
        return redirect()->route('admin-panel.users.index')->with(['success' => true, 'message' => "User created successfully."]);
    }

    public function edit(User $user)
    {
        return view('admin-panel.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $request->validate(['email' => 'unique:users,email,' . $user->id]);
        $this->userRepository->updateUser($request, $user);

        if ($request->password) {
            $user->update(['password' => bcrypt($request->password)]);
        }

        return redirect()->route('admin-panel.users.index')->with(['success' => true, 'message' => "User updated successfully."]);
    }

    public function destroyUser(User $user): RedirectResponse
    {
        $user->delete();
        Booking::where('user_id', $user->id)->delete();
        return back()->with(['success' => true, 'message' => "User deleted successfully."]);
    }
}
