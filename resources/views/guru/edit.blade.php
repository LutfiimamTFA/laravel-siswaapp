<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Edit Guru</h2>
    </x-slot>

    <div class="max-w-xl mx-auto py-6">
        <form action="{{ route('guru.update', $guru->id) }}" method="POST" class="space-y-4 bg-white dark:bg-gray-800 p-6 rounded shadow">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nama</label>
                <input type="text" name="nama" value="{{ $guru->nama }}" class="w-full border px-3 py-2 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">NIP</label>
                <input type="text" name="nip" value="{{ $guru->nip }}" class="w-full border px-3 py-2 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Jurusan</label>
                <input type="text" name="Jurusan" value="{{ $guru->jurusan }}" class="w-full border px-3 py-2 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
            </div>

            <div class="flex gap-4 pt-4">
                <a href="{{ route('guru.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
