<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendaftar;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard.
     */
    public function index()
    {
        // 1. Dapatkan ID user yang sedang login
        $id_user_login = Auth::id();

        // 2. Cari data pendaftar di tabel 'pendaftar' berdasarkan ID user tersebut
        $pendaftar = Pendaftar::where('id_user', $id_user_login)->first();

        // 3. Kirim data pendaftar ke view 'dashboard' (bukan 'dashboard.index')
        return view('dashboard', [
            'pendaftar' => $pendaftar
        ]);
    }
}