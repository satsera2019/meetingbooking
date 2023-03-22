<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Booking;
use App\Models\User;
use App\Repositories\Interfaces\BookingRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    private $bookingRepository;

    public function __construct(BookingRepositoryInterface $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function loginForm()
    {
        return (auth()->check()) ? view('user-panel.index') : view('user-panel.login');
    }

    public function index(Request $request)
    {
        $bookings = $this->bookingRepository->getBookingWithFilters($request);
        return view('user-panel.index', compact('bookings'));
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $result = Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'user',]);
        if ($result) {
            return redirect()->route('user-panel.index');
        }
        return back()->with(['error' => 'Invalid credentials.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
