<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Siswa
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
        <form action="{{ route('siswa.store') }}" method="POST" class="space-y-6 bg-white dark:bg-gray-800 p-6 rounded shadow">
            @csrf

            {{-- Nama Siswa --}}
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Nama</label>
                <input 
                    type="text" 
                    name="nama" 
                    id="nama" 
                    class="w-full bg-white dark:bg-gray-700 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
            </div>

            {{-- NIS --}}
            <div>
                <label for="nis" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">NIS</label>
                <input 
                    type="text" 
                    name="nis" 
                    id="nis" 
                    class="w-full bg-white dark:bg-gray-700 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
            </div>

            {{-- Jurusan --}}
            <div>
                <label for="jurusan_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Jurusan</label>
                <select 
                    name="jurusan_id" 
                    id="jurusan_id"
                    class="w-full bg-white dark:bg-gray-700 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
                    <option value="">-- Pilih Jurusan --</option>
                    @foreach($jurusans as $jurusan)
                        <option value="{{ $jurusan->id }}">
                {{ $jurusan->guru->jurusan }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Kelas --}}
            <div>
                <label for="kelas_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Kelas</label>
                <select 
                    name="kelas_id" 
                    id="kelas_id"
                    class="w-full bg-white dark:bg-gray-700 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
                    <option value="">-- Pilih Kelas --</option>
                    @foreach($jurusans as $jurusan)
                        <option value="{{ $jurusan->id }}">
                            Kelas {{ $jurusan->kelas }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Guru --}}
            <div>
                <label for="guru_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Guru</label>
                <select 
                    name="guru_id" 
                    id="guru_id"
                    class="w-full bg-white dark:bg-gray-700 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
                    <option value="">-- Pilih Guru --</option>
                    @foreach($jurusans as $jurusan)
                        <option value="{{ $jurusan->guru->id ?? '' }}">
                            {{ $jurusan->guru->nama ?? 'Tanpa Guru' }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Tombol --}}
            <div class="pt-4 flex items-center gap-4">
                <a href="{{ route('siswa.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded shadow">
                    Kembali
                </a>

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
