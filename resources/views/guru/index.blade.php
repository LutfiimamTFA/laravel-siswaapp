<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Daftar Guru</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <a href="{{ route('guru.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Tambah Guru</a>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-2 mt-2">{{ session('success') }}</div>
        @endif

        <table class="mt-4 w-full border text-gray-800 dark:text-white">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">NIP</th>
                    <th class="border px-4 py-2">Jurusan</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gurus as $guru)
                    <tr>
                        <td class="border px-4 py-2">{{ $guru->nama }}</td>
                        <td class="border px-4 py-2">{{ $guru->nip }}</td>
                        <td class="border px-4 py-2">{{ $guru->jurusan ?? '-' }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('guru.edit', $guru->id) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('guru.destroy', $guru->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 ml-2" onclick="return confirm('Yakin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
