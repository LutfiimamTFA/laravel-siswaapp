<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            📌 Dashboard
        </h2>
    </x-slot>

    <div class="p-6 text-gray-800 dark:text-gray-100 space-y-8">
        {{-- Sambutan --}}
        <div>
            <p class="text-lg font-semibold">Selamat datang di dashboard 🎉</p>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Kamu berhasil login ke sistem.
            </p>
        </div>

        {{-- Informasi langkah-langkah --}}
        <div class="p-4 bg-yellow-100 dark:bg-yellow-800 text-yellow-800 dark:text-yellow-200 border-l-4 border-yellow-500 rounded">
            <strong>Informasi:</strong>
            <ul class="list-disc list-inside mt-2 space-y-1">
                <li>Tambahkan <strong>Guru</strong> terlebih dahulu.</li>
                <li>Buat <strong>Jurusan / Kelas</strong> dan hubungkan dengan Guru.</li>
                <li>Tambahkan <strong>Siswa</strong> dengan memilih kelas yang sesuai.</li>
            </ul>
        </div>

        {{-- Laporan Siswa & Guru per Jurusan --}}
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            <h3 class="text-lg font-semibold mb-6 border-b border-gray-300 dark:border-gray-700 pb-2">
                📊 Laporan Data Sekolah
            </h3>

            {{-- Informasi cara kerja --}}
            <div class="p-4 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 border-l-4 border-blue-500 rounded mb-6">
                <strong>Cara melihat laporan:</strong>
                <ol class="list-decimal list-inside mt-2 space-y-1">
                    <li>Klik salah satu <strong>nama kelas</strong> di bawah.</li>
                    <li>Sistem akan menampilkan <strong>List Siswa</strong> berdasarkan kelas yang dipilih.</li>
                    <li>Sistem akan menampilkan <strong>List Guru</strong> yang mengajar di kelas tersebut.</li>
                    <li>Sistem juga akan menampilkan <strong>List Siswa + Kelas + Guru</strong> dalam satu tampilan.</li>
                </ol>
            </div>

            {{-- Livewire Component --}}
            @livewire('laporan-jurusan-baru')
        </div>
    </div>
</x-app-layout>
