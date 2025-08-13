<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900">

    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-lg w-full bg-white dark:bg-gray-800 p-6 rounded shadow">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">Tambah Siswa</h2>

            <form wire:submit.prevent="save" class="space-y-4">

                {{-- Nama --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Nama</label>
                    <input type="text" wire:model="nama" class="w-full border rounded px-3 py-2 dark:bg-gray-700 dark:text-white">
                    @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- NIS --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">NIS</label>
                    <input type="text" wire:model="nis" class="w-full border rounded px-3 py-2 dark:bg-gray-700 dark:text-white">
                    @error('nis') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- Jurusan --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Jurusan</label>
                    <select wire:model="jurusan_id" class="w-full border rounded px-3 py-2 dark:bg-gray-700 dark:text-white">
                        <option value="">-- Pilih Jurusan --</option>
                        @foreach($jurusans as $jurusan)
                            <option value="{{ $jurusan->id }}">
                                     {{ $jurusan->guru->jurusan }}
                            </option>
                        @endforeach
                    </select>
                    @error('jurusan_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- Kelas --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Kelas</label>
                    <select wire:model="kelas_id" class="w-full border rounded px-3 py-2 dark:bg-gray-700 dark:text-white">
                        <option value="">-- Pilih Kelas --</option>
                        @foreach($jurusans as $jurusan)
                            <option value="{{ $jurusan->id }}">
                                Kelas {{ $jurusan->kelas }}
                            </option>
                        @endforeach
                    </select>
                    @error('kelas_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- Guru --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Guru</label>
                    <select wire:model="guru_id" class="w-full border rounded px-3 py-2 dark:bg-gray-700 dark:text-white">
                        <option value="">-- Pilih Guru --</option>
                        @foreach($jurusans as $jurusan)
                            <option value="{{ $jurusan->guru->id ?? '' }}">
                                {{ $jurusan->guru->nama ?? 'Tanpa Guru' }}
                            </option>
                        @endforeach
                    </select>
                    @error('guru_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- Tombol --}}
                <div class="flex justify-end gap-2">
                    <a href="{{ route('siswa.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                        Batal
                    </a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
