<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            Daftar Siswa, Kelas, dan Guru
        </h2>
    </x-slot>

    <div class="p-6 bg-white dark:bg-gray-800 rounded shadow">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200 dark:bg-gray-700">
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama Siswa</th>
                    <th class="border px-4 py-2">Kelas</th>
                        <th class="border px-4 py-2">Jurusan</th>
                    <th class="border px-4 py-2">Guru</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($siswa as $index => $item)
                    <tr>
                        <td class="border px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2">{{ $item->nama }}</td>
                        <td class="border px-4 py-2">{{ $item->jurusan->kelas ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $item->jurusan->guru->jurusan ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $item->jurusan->guru->nama ?? '-' }}</td>
                         
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
