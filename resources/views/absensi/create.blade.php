<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Absensi Harian Santri') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('absensi.store') }}" method="POST">
                        @csrf
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">Nama</th>
                                    <th class="border px-4 py-2">Hadir</th>
                                    <th class="border px-4 py-2">Izin</th>
                                    <th class="border px-4 py-2">Tanpa Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($santri as $s)
                                <tr>
                                    <td class="border px-4 py-2">{{ $s->nama }}</td>
                                    <td class="border px-4 py-2">
                                        <input type="radio" name="santri_id[{{ $s->id }}]" value="hadir">
                                    </td>
                                    <td class="border px-4 py-2">
                                        <input type="radio" name="santri_id[{{ $s->id }}]" value="izin">
                                    </td>
                                    <td class="border px-4 py-2">
                                        <input type="radio" name="santri_id[{{ $s->id }}]" value="tanpa_keterangan">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary mt-4">Simpan Absensi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
