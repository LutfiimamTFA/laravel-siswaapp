<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Siswa
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" class="space-y-6 bg-white dark:bg-gray-800 p-6 rounded shadow">
            @csrf
            @method('PUT')

            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Nama</label>
                <input 
                    type="text" 
                    name="nama" 
                    id="nama" 
                    value="{{ $siswa->nama }}" 
                    class="w-full bg-white dark:bg-gray-700 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div>
                <label for="nis" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">NIS</label>
                <input 
                    type="text" 
                    name="nis" 
                    id="nis" 
                    value="{{ $siswa->nis }}" 
                    class="w-full bg-white dark:bg-gray-700 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div>
                <label for="kelas" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Kelas</label>
                <input 
                    type="text" 
                    name="kelas" 
                    id="kelas" 
                    value="{{ $siswa->kelas }}" 
                    class="w-full bg-white dark:bg-gray-700 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div class="pt-4 flex items-center gap-4">
                <a href="{{ route('siswa.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded shadow">
                    Kembali
                </a>

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
