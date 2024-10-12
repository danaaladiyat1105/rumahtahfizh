<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
            {{ __('A B S E N S I') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="p-6 text-gray-900">
                    <a href="{{ route('absensi.create') }}" class="btn btn-primary mt-4">
                        <span class="icon"><ion-icon name="hand-right"></ion-icon></span> Absensi Hari Ini
                    </a>
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
                            @foreach($absensiData as $data)
                            <tr>
                                <td class="border px-4 py-2">{{ $data['santri']->nama }}</td>
                                <td class="border px-4 py-2">{{ $data['hadir'] }}</td>
                                <td class="border px-4 py-2">{{ $data['izin'] }}</td>
                                <td class="border px-4 py-2">{{ $data['tanpa_keterangan'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
