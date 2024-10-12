<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Santri') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <form action="{{ route('santri.update', $santri->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Menggunakan method PUT untuk update data -->

                    <!-- Nama -->
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama', $santri->nama) }}" class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="mb-4">
                        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $santri->tanggal_lahir) }}" class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    </div>

                    <!-- Hafalan -->
                    <div class="mb-4">
                        <label for="hafalan" class="block text-sm font-medium text-gray-700">Hafalan</label>
                        <input type="text" name="hafalan" id="hafalan" value="{{ old('hafalan', $santri->hafalan) }}" class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-4">
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <input type="text" name="alamat" id="alamat" value="{{ old('alamat', $santri->alamat) }}" class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    </div>

                    <!-- Nama Ayah -->
                    <div class="mb-4">
                        <label for="nama_ayah" class="block text-sm font-medium text-gray-700">Nama Ayah</label>
                        <input type="text" name="nama_ayah" id="nama_ayah" value="{{ old('nama_ayah', $santri->nama_ayah) }}" class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    </div>

                    <!-- Nama Ibu -->
                    <div class="mb-4">
                        <label for="nama_ibu" class="block text-sm font-medium text-gray-700">Nama Ibu</label>
                        <input type="text" name="nama_ibu" id="nama_ibu" value="{{ old('nama_ibu', $santri->nama_ibu) }}" class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    </div>

                    <!-- Tombol Update -->
                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                            Update
                        </button>
                    </div>
                </form>

                <!-- Pesan sukses -->
                @if(session('success'))
                    <div class="mt-4 p-2 bg-green-100 text-green-800 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Pesan error -->
                @if ($errors->any())
                    <div class="mt-4 p-2 bg-red-100 text-red-800 rounded-lg">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
