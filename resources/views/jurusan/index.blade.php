<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Daftar Kelas & Jurusan
        </h2>
    </x-slot>
<div class="mb-4">
    <form method="GET" action="{{ route('jurusan.index') }}" class="flex items-center gap-4">
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

    <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
        <a href="{{ route('jurusan.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah</a>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded">
                <thead class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100">
                    <tr>
                        <th class="border px-4 py-2">Guru Pengampu</th>
                        <th class="border px-4 py-2">Kelas</th>
                        <th class="border px-4 py-2">Jurusan</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jurusans as $jurusan)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="border px-4 py-2">{{ $jurusan->guru->nama ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $jurusan->kelas }}</td>
                            <td class="border px-4 py-2">{{ $jurusan->guru->jurusan ?? '-' }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('jurusan.edit', $jurusan->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('jurusan.destroy', $jurusan->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin ingin menghapus?')" class="text-red-600 ml-2 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-gray-500 py-4">Belum ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
