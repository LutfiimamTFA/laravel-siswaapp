<div class="space-y-4">
    {{-- Header & Search --}}
    <div class="flex justify-between items-center">
        {{-- Search --}}
        <form wire:submit.prevent="searchNow" class="flex items-center gap-2">
            <input
                type="text"
                wire:model.defer="search"
                placeholder="Cari guru, kelas, atau jurusan..."
                class="border rounded px-3 py-2 w-64 dark:bg-gray-700 dark:text-white"
            >
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded flex items-center">
                🔍
            </button>
        </form>

        {{-- Tambah Data --}}
        <a href="{{ route('jurusan.create') }}" 
           class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
            + Tambah Jurusan
        </a>
    </div>

    {{-- Table --}}
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

    {{-- Pagination --}}
    <div>
        {{ $jurusans->links() }}
    </div>
</div>
