
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DATA SANTRI') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <link rel="stylesheet" href="">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <a href="{{ route('santri.create') }}" class="btn btn-primary">
                            <span class="icon"><ion-icon name="person-add"></ion-icon></span>
                            Tambah Data Santri
                        </a>
                    </div>
                
                    <!-- Tampilkan pesan sukses jika ada -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                
                    <table class="table">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama</th>
                                <th>Usia</th> <!-- Ubah label kolom dari Tanggal Lahir ke Usia -->
                                <th>Hafalan</th>
                                <th>Alamat</th>
                                <th>Nama Ayah</th>
                                <th>Nama Ibu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp <!-- Inisialisasi variabel penghitung -->
                            @foreach($santri as $s)
                            <tr>
                                <td>{{ $no++ }}</td> <!-- Tampilkan nomor urut -->
                                <td>{{ $s->nama }}</td>
                                <td>{{ $s->usia }} Tahun</td> <!-- Tampilkan usia yang sudah dihitung di controller -->
                                <td>{{ $s->hafalan }} <span class="font-semibold">Juz</span></td>
                                <td>{{ $s->alamat }}</td>
                                <td>{{ $s->nama_ayah }}</td>
                                <td>{{ $s->nama_ibu }}</td>
                                <td>
                                    <a href="{{ route('santri.edit', $s->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('santri.destroy', $s->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

