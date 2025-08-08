<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <div class="min-h-screen">
        @include('layouts.navigation') <!-- Nav dari Breeze -->

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex gap-6">
                <!-- Sidebar -->
              <aside class="w-64 bg-gray-100 dark:bg-gray-900 p-4 rounded-lg">
    <nav class="space-y-2">
        <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">Dashboard</a>
        <a href="{{ route('siswa.index') }}" class="block px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">Siswa</a>
        <a href="{{ route('jurusan.index') }}" class="block px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">Kelas</a>
        <a href="{{ route('guru.index') }}" class="block px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">Guru</a>

        <!-- Tambahan menu laporan -->
        <hr class="border-gray-300 dark:border-gray-700 my-2">
        <span class="text-sm font-semibold text-gray-600 dark:text-gray-300 px-4">Laporan</span>
   <a href="{{ route('laporan.siswa.kelas', 10) }}" class="block px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">Siswa per Kelas</a>
<a href="{{ route('laporan.guru.kelas', 10) }}" class="block px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">Guru per Kelas</a>
<a href="{{ route('laporan.siswa.kelas.guru') }}" class="block px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">Siswa–Kelas–Guru</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="w-full text-left block px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700 text-red-500">
                Logout
            </button>
        </form>
    </nav>
</aside>


                <!-- Content -->
                <div class="flex-1 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>
</body>
</html>
