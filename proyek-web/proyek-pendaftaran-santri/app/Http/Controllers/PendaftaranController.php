<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Hash;

class PendaftaranController extends Controller
{
    /**
     * Menampilkan halaman formulir pendaftaran.
     */
    public function create()
    {
        return view('pendaftaran.create');
    }

    /**
     * Menerima dan memproses data dari formulir.
     */
    public function store(Request $request)
    {
        // 1. Validasi data yang masuk
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'required|string|unique:pendaftar,nisn|max:20',
            'asal_sekolah' => 'required|string|max:255',
            'jurusan_pilihan' => 'required|string',
        ]);

        // 2. Buat user baru (untuk login)
        // Kita akan gunakan NISN sebagai email sementara dan password default
        $user = User::create([
            'name' => $validatedData['nama_lengkap'],
            'email' => $validatedData['nisn'] . '@pesantren.com', // Email unik sementara
            'password' => Hash::make('password123'), // Password default, harusnya diganti nanti
        ]);

        // 3. Simpan data ke tabel pendaftar
        Pendaftar::create([
            'id_user' => $user->id, // Ambil id dari user yang baru dibuat
            'nama_lengkap' => $validatedData['nama_lengkap'],
            'nisn' => $validatedData['nisn'],
            'asal_sekolah' => $validatedData['asal_sekolah'],
            'jurusan_pilihan' => $validatedData['jurusan_pilihan'],
        ]);

        // 4. Arahkan ke halaman sukses
        return redirect()->route('pendaftaran.sukses');
    }

    /**
     * Menampilkan halaman sukses setelah pendaftaran.
     */
    public function sukses()
    {
        return view('pendaftaran.sukses');
    }
}