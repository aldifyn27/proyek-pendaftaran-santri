<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Daftar Calon Santri</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(session('success'))
                        <div class="mb-4 font-medium text-sm text-green-600">{{ session('success') }}</div>
                    @endif
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nama Lengkap</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">NISN</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Asal Sekolah</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status Saat Ini</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800">
                            @foreach($pendaftarList as $pendaftar)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $pendaftar->nama_lengkap }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $pendaftar->nisn }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ $pendaftar->asal_sekolah }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">{{ Str::title($pendaftar->status) }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                    <form action="{{ route('admin.pendaftar.updateStatus', $pendaftar->id) }}" method="POST">
                                        @csrf
                                        <select name="status" class="rounded">
                                            <option value="baru" @if($pendaftar->status == 'baru') selected @endif>Baru</option>
                                            <option value="diverifikasi" @if($pendaftar->status == 'diverifikasi') selected @endif>Diverifikasi</option>
                                            <option value="lulus" @if($pendaftar->status == 'lulus') selected @endif>Lulus</option>
                                            <option value="tidak_lulus" @if($pendaftar->status == 'tidak_lulus') selected @endif>Tidak Lulus</option>
                                        </select>
                                        <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded">Update</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>