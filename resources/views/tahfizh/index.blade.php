<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
            {{ __('T A H F I Z H') }}
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
                <table class="table">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama Santri</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Total Hafalan (Juz)</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Setoran Terbaru</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataHafalan as $s)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $s['nama'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $s['total_hafalan'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $s['setoran_terbaru'] }}</td>
                            <td>
                                <a href="{{ route('tahfizh.create', $s['id']) }}" class="btn btn-warning">Setor Hafalan Baru</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
