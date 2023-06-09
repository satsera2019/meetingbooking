<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return (auth()->check()) ? redirect()->route('admin-panel.users.index') : view('admin-panel.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $result = Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'admin',]);
        if ($result) {
            return redirect()->route('admin-panel.users.index');
        }
        return back()->with(['success' => false, 'error' => "Incorrect credentials."]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin-panel.loginform');
    }

    public function registerform()
    {
        return view('admin-panel.register');
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'admin',
        ]);
        if ($user) {
            Auth::login($user);
            return redirect(route("admin-panel.loginform"))->with(['message' => "Registration completed successfully."]);
        }
        return back()->with(['error' => 'Something went wrong, try again.']);
    }
}
