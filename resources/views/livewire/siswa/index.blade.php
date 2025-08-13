<div class="text-gray-900 dark:text-gray-100">
    {{-- Tombol Tambah --}}
    <a href="{{ route('siswa.create') }}" 
       class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 mb-4 rounded shadow">
       + Tambah Siswa
    </a>

    {{-- Filter & Search --}}
    <div class="mb-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="flex items-center gap-4">
            <label for="kelas" class="text-gray-700 dark:text-gray-200">Filter Kelas:</label>
            <select wire:model="kelas" id="kelas"
                class="rounded px-3 py-1 bg-white dark:bg-gray-700 dark:text-white border dark:border-gray-600">
                <option value="">-- Semua Kelas --</option>
                @foreach($daftarKelas as $item)
                    <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>
        </div>

        {{-- Search Bar --}}
        <form wire:submit.prevent="searchData" class="flex items-center gap-2">
            <input
                type="text"
                wire:model="search"
                placeholder="Cari nama, NIS, atau jurusan..."
                class="border rounded px-3 py-1 dark:bg-gray-700 dark:text-white"
            >
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                🔍
            </button>
        </form>
    </div>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 mb-4 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabel --}}
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
                @forelse($siswas as $siswa)
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                        <td class="border px-4 py-2">{{ $siswa->nama }}</td>
                        <td class="border px-4 py-2">{{ $siswa->nis }}</td>
                        <td class="border px-4 py-2">{{ $siswa->jurusan->kelas ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $siswa->jurusan->guru->jurusan ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $siswa->jurusan->guru->nama ?? '-' }}</td>
                        <td class="border px-4 py-2 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('siswa.edit', $siswa->id) }}" 
                                   class="bg-yellow-400 hover:bg-yellow-500 text-white text-xs font-semibold px-3 py-1 rounded shadow">
                                    ✏️ Edit
                                </a>
                                <button 
                                    wire:click="delete({{ $siswa->id }})"
                                    onclick="return confirm('Yakin ingin menghapus?')"
                                    class="bg-red-500 hover:bg-red-600 text-white text-xs font-semibold px-3 py-1 rounded shadow">
                                    🗑️ Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-500">
                            Tidak ada data siswa
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $siswas->links() }}
    </div>
</div>
