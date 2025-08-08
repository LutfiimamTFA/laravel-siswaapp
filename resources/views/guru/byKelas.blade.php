<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Guru Kelas {{ $kelas }}</h2>
    </x-slot>

    <div class="p-4 bg-white dark:bg-gray-800 rounded shadow">
        <table class="w-full border-collapse">
            <thead>
                <tr>
                    <th class="border px-3 py-2">Nama</th>
                    <th class="border px-3 py-2">NIP</th>
                    <th class="border px-3 py-2">Jurusan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($guru as $item)
                <tr>
                    <td class="border px-3 py-2">{{ $item->nama }}</td>
                    <td class="border px-3 py-2">{{ $item->nip }}</td>
                    <td class="border px-3 py-2">
                        {{ $item->jurusan->first()->jurusan ?? '-' }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
