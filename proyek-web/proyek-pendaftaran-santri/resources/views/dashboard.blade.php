<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Santri') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Cek apakah data pendaftar ditemukan --}}
                    @if ($pendaftar)
                        
                        <h3 class="text-lg font-medium">
                            Selamat Datang, {{ $pendaftar->nama_lengkap }}!
                        </h3>
                        <p class="text-sm text-gray-500 mb-4">
                            Berikut adalah ringkasan status pendaftaran Anda.
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="md:col-span-2 space-y-6">
                                <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    <h4 class="font-bold">Status Pendaftaran</h4>
                                    <p class="text-2xl text-green-600 dark:text-green-400 mt-2">{{ Str::title($pendaftar->status) }}</p>
                                    <p class="text-sm text-gray-500 mt-1">Panitia sedang memeriksa data dan dokumen yang telah Anda kirim.</p>
                                </div>
                                <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    <h4 class="font-bold">Informasi Pembayaran</h4>
                                    <div class="mt-2">
                                        <p>Total Biaya Pendaftaran: <span class="font-semibold">Rp 250.000</span></p>
                                        <p>Status: <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-200 text-yellow-800">Menunggu Pembayaran</span></p>
                                        <button class="mt-2 inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500">
                                            Lakukan Pembayaran
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    <h4 class="font-bold">Data Diri</h4>
                                    <div class="mt-2 text-sm space-y-1">
                                        <p><strong>Nama:</strong> {{ $pendaftar->nama_lengkap }}</p>
                                        <p><strong>NISN:</strong> {{ $pendaftar->nisn }}</p>
                                        <p><strong>Asal Sekolah:</strong> {{ $pendaftar->asal_sekolah }}</p>
                                        <p><strong>Pilihan Jurusan:</strong> {{ $pendaftar->jurusan_pilihan }}</p>
                                    </div>
                                </div>
                                <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    <h4 class="font-bold">Dokumen Persyaratan</h4>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">Unggah dokumen yang dibutuhkan.</p>
                                        <button class="mt-2 inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500">
                                            Unggah Dokumen
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @else

                        <div class="text-center py-16 px-6">
                            {{-- Icon Dokumen --}}
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 class="mt-2 text-lg font-medium text-gray-900 dark:text-white">Data Pendaftaran Belum Lengkap</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Akun Anda sudah aktif, namun Anda perlu melengkapi formulir pendaftaran santri untuk melanjutkan.
                            </p>
                            <div class="mt-6">
                                <a href="{{ route('pendaftaran.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Lengkapi Formulir Sekarang
                                </a>
                            </div>
                        </div>

                    @endif

                </div>
            </div>
        </div>
    </x-app-layout>