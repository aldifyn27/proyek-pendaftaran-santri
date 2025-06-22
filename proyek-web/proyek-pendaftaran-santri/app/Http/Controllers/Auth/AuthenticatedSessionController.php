<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // ==========================================================
        // LOGIKA PENGALIHAN BERDASARKAN PERAN (ROLE) DIMULAI DI SINI
        // ==========================================================

        $url = '';
        if ($request->user()->role === 'admin') {
            // Jika user adalah admin, arahkan ke rute admin.dashboard
            $url = route('admin.dashboard');
        } else {
            // Jika bukan admin (adalah santri), arahkan ke dashboard biasa
            $url = RouteServiceProvider::HOME; // RouteServiceProvider::HOME secara default adalah '/dashboard'
        }

        return redirect()->intended($url);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}