<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pendaftar;

class AdminController extends Controller {
    public function dashboard() {
        // Menghitung jumlah pendaftar untuk ditampilkan di dashboard admin
        $totalPendaftar = Pendaftar::count();
        return view('admin.dashboard', compact('totalPendaftar'));
    }

    public function pendaftarList() {
        // Mengambil semua data pendaftar dan mengirimkannya ke view
        $pendaftarList = Pendaftar::with('user')->get();
        return view('admin.pendaftar_list', compact('pendaftarList'));
    }

    public function updateStatus(Request $request, $id) {
        // Validasi input
        $request->validate(['status' => 'required|string']);
        
        // Cari pendaftar dan update statusnya
        $pendaftar = Pendaftar::findOrFail($id);
        $pendaftar->status = $request->status;
        $pendaftar->save();

        // Kembali ke halaman daftar pendaftar dengan pesan sukses
        return redirect()->route('admin.pendaftar.list')->with('success', 'Status pendaftar berhasil diperbarui.');
    }
}