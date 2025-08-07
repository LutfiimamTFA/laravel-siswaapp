<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="p-4 text-gray-800 dark:text-gray-100">
        <p>Selamat datang di dashboard.</p>
        <p>Kamu berhasil login.</p>

        <div class="mt-6 p-4 bg-yellow-100 dark:bg-yellow-800 text-yellow-800 dark:text-yellow-200 border-l-4 border-yellow-500 rounded">
            <strong>Informasi:</strong>
            <ul class="list-disc list-inside mt-2">
                <li>Silakan tambahkan <strong>Guru</strong> terlebih dahulu.</li>
                <li>Kemudian buat <strong>Jurusan / Kelas</strong> dan hubungkan dengan Guru.</li>
                <li>Setelah itu baru bisa menambahkan <strong>Siswa</strong>.</li>
            </ul>
        </div>
    </div>
</x-app-layout>
