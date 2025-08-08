<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            Guru Kelas {{ $kelas }}
        </h2>
    </x-slot>

    <div class="p-6 bg-white dark:bg-gray-800 rounded shadow">
        @if($guru)
            <p><strong>Nama:</strong> {{ $guru->nama }}</p>
            <p><strong>NIP:</strong> {{ $guru->nip }}</p>
        @else
            <p class="text-gray-500 dark:text-gray-400">Tidak ada guru untuk kelas ini.</p>
        @endif
    </div>
</x-app-layout>
