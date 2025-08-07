<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Daftar Siswa
        </h2>
    </x-slot>

    <div class="text-gray-900 dark:text-gray-100">
        <a href="{{ route('siswa.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 mb-4 rounded shadow">
            + Tambah Siswa
        </a>
<div class="mb-4">
    <form method="GET" action="{{ route('siswa.index') }}" class="flex items-center gap-4">
        <label for="kelas" class="text-gray-700 dark:text-gray-200">Filter Kelas:</label>
        <select name="kelas" id="kelas"
            onchange="this.form.submit()"
            class="rounded px-3 py-1 bg-white dark:bg-gray-700 dark:text-white border dark:border-gray-600">
            <option value="">-- Semua Kelas --</option>
            @foreach($daftarKelas as $item)
                <option value="{{ $item }}" {{ request('kelas') == $item ? 'selected' : '' }}>
                    {{ $item }}
                </option>
            @endforeach
        </select>
    </form>
</div>
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 mb-4 rounded shadow">
                
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full table-auto bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded shadow">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700 text-left">
                        <th class="border px-4 py-2">Nama</th>
                        <th class="border px-4 py-2">NIS</th>
                        <th class="border px-4 py-2">Kelas</th>
                        <th class="border px-4 py-2">Jurusan</th>
                        <th class="border px-4 py-2">Guru Pengampu</th>
                        <th class="border px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($siswas as $siswa)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            <td class="border px-4 py-2">{{ $siswa->nama }}</td>
                            <td class="border px-4 py-2">{{ $siswa->nis }}</td>
                            <td class="border px-4 py-2">{{ $siswa->jurusan->kelas ?? '-' }}</td>
                       <td>{{ $siswa->jurusan->guru->jurusan ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $siswa->jurusan->guru->nama ?? '-' }}</td>
                            <td class="border px-4 py-2 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('siswa.edit', $siswa->id) }}" 
                                       class="bg-yellow-400 hover:bg-yellow-500 text-white text-xs font-semibold px-3 py-1 rounded shadow">
                                        ✏️ Edit
                                    </a>
                                    <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            class="bg-red-500 hover:bg-red-600 text-white text-xs font-semibold px-3 py-1 rounded shadow">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
