<div>
    {{-- List Kelas --}}
    <h2 class="text-xl font-semibold mb-4">Daftar Kelas / Jurusan</h2>
    <ul class="space-y-2 mb-6">
        @foreach($jurusanList as $jurusan)
            <li>
                <button 
                    wire:click="confirmJurusan('{{ $jurusan->id }}')" 
                    class="w-full text-left px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-800 transition">
                    {{ $jurusan->kelas ?? 'Tidak Ada Nama Kelas' }}
                </button>
            </li>
        @endforeach
    </ul>

    {{-- Modal Konfirmasi Pilih Kelas --}}
    @if($showConfirmModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded shadow-lg w-80 text-black">
                <h2 class="text-lg font-semibold mb-4">Konfirmasi Pilih Kelas</h2>
                <p>Yakin pilih kelas <strong>{{ $kelasDetail->kelas ?? '' }}</strong>?</p>
                <div class="mt-6 flex justify-end space-x-3">
                    <button wire:click="confirmSelectedJurusan"
                        class="px-5 py-2 font-semibold bg-blue-600 text-black rounded hover:bg-blue-700 transition">
                        Oke
                    </button>
                </div>
            </div>
        </div>
    @endif

    {{-- Tabel Data Guru dan Siswa --}}
    @if($showData)
        {{-- Guru --}}
        <h3 class="font-bold text-lg mb-2">Daftar Guru Kelas: {{ $kelasDetail->kelas ?? '' }}</h3>
        @if($guruList->count())
            <table class="w-full border border-gray-300 rounded mb-6">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border px-4 py-2">Nama Guru</th>
                        <th class="border px-4 py-2">NIP</th>
                        <th class="border px-4 py-2">Jurusan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($guruList as $guru)
                        <tr class="even:bg-gray-50">
                            <td class="border px-4 py-2">{{ $guru->nama }}</td>
                            <td class="border px-4 py-2">{{ $guru->nip ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $guru->jurusan ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="mb-6">Tidak ada guru di kelas ini.</p>
        @endif

        {{-- Siswa --}}
        <h3 class="font-bold text-lg mb-2">Daftar Siswa Kelas: {{ $kelasDetail->kelas ?? '' }}</h3>
        @if($siswaList->count())
            <table class="w-full border border-gray-300 rounded">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Nama</th>
                        <th class="border px-4 py-2">NIS</th>
                        <th class="border px-4 py-2">Jurusan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($siswaList as $index => $siswa)
                        <tr class="even:bg-gray-50">
                            <td class="border px-4 py-2">{{ $index + 1 }}</td>
                            <td class="border px-4 py-2">{{ $siswa->nama }}</td>
                            <td class="border px-4 py-2">{{ $siswa->nis }}</td>
                             <td>{{ $siswa->jurusan->guru->jurusan ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Tidak ada siswa di kelas ini.</p>
        @endif
    @endif
</div>
