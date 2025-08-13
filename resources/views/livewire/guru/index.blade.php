<div class="bg-white dark:bg-gray-800 p-6 rounded shadow space-y-4">

    {{-- Tombol Tambah Guru --}}
    <div class="flex justify-between items-center">
        <a href="{{ route('guru.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
           + Tambah Guru
        </a>

        {{-- Search --}}
        <div class="flex items-center border rounded overflow-hidden">
            <input 
                type="text" 
                wire:model.defer="search" 
                wire:keydown.enter="$refresh"
                placeholder="Cari guru..." 
                class="px-3 py-2 w-64 bg-transparent focus:outline-none text-black placeholder-black"
            >
            <button wire:click="$refresh" class="px-3 text-gray-500 hover:text-gray-700">
                🔍
            </button>
        </div>
    </div>

    {{-- Tabel Guru --}}
    <div class="overflow-x-auto">
        <table class="w-full border border-gray-300 dark:border-gray-700 rounded">
            <thead class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100">
                <tr>
                    <th class="border px-4 py-2 text-left">Nama</th>
                    <th class="border px-4 py-2 text-left">Jurusan</th>
                    <th class="border px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($gurus as $guru)
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                        <td class="border px-4 py-2">{{ $guru->nama }}</td>
                        <td class="border px-4 py-2">{{ $guru->jurusan ?? '-' }}</td>
                        <td class="border px-4 py-2 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('guru.edit', $guru->id) }}" 
                                   class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-sm shadow">
                                    ✏️ Edit
                                </a>
                                <button 
                                    onclick="confirm('Yakin hapus?') || event.stopImmediatePropagation()" 
                                    wire:click="delete({{ $guru->id }})" 
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm shadow">
                                    🗑️ Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-gray-500 py-4">
                            Tidak ada data guru
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $gurus->links() }}
    </div>

</div>
