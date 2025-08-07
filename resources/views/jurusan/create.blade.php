<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Kelas & Jurusan
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
        <form action="{{ route('jurusan.store') }}" method="POST" class="space-y-4 bg-white dark:bg-gray-800 p-6 rounded shadow">
            @csrf

        <div>
    <label for="kelas" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Kelas</label>
    <input type="text" name="kelas" id="kelas" value="{{ old('kelas', $jurusan->kelas ?? '') }}"
        class="w-full bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 border rounded px-3 py-2">
</div>
            <div>
                <label for="guru_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Guru Pengampu</label>
                <select name="guru_id" id="guru_id" class="w-full bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 border rounded px-3 py-2">
                    <option value="">-- Pilih Guru --</option>
                    @foreach ($gurus as $guru)
                        <option value="{{ $guru->id }}">{{ $guru->nama }} - {{ $guru->jurusan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex gap-4 pt-4">
                <a href="{{ route('jurusan.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>
