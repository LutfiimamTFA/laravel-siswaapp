<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            Daftar Siswa Kelas {{ $kelas }}
        </h2>
    </x-slot>

    <div class="p-6 bg-white dark:bg-gray-800 rounded shadow">
        @if($siswa->count() > 0)
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700">
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Nama</th>
                        <th class="border px-4 py-2">NIS</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($siswa as $index => $item)
    <tr>
        <td class="border px-4 py-2">{{ $index + 1 }}</td>
        <td class="border px-4 py-2">{{ $item->nama }}</td>
        <td class="border px-4 py-2">{{ $item->nis }}</td>
    </tr>
@endforeach

                </tbody>
            </table>
        @else
            <p class="text-gray-500 dark:text-gray-400">Tidak ada siswa di kelas ini.</p>
        @endif
    </div>
</x-app-layout>
