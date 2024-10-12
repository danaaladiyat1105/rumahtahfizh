<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Santri') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <!-- Menampilkan Tahfiz (nama santri) di bagian atas -->
                <h3 class="text-xl font-semibold text-gray-900 mb-6">
                Santri : {{ $santri->nama }}
                </h3>

                <form action="{{ route('tahfizh.store', $santri->id) }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Juz Field -->
                    <div>
                        <label for="juz" class="block text-sm font-medium text-gray-700">Juz</label>
                        <input type="number" name="juz" id="juz" min="1" max="30" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <!-- Halaman Field -->
                    <div>
                        <label for="halaman" class="block text-sm font-medium text-gray-700">Halaman</label>
                        <input type="number" name="halaman" id="halaman" min="1" max="600" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <!-- Baris Field -->
                    <div>
                        <label for="baris" class="block text-sm font-medium text-gray-700">Jumlah setoran (baris) : 1 halaman = 15 baris</label>
                        <input type="number" name="baris" id="baris" min="1" max="300" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" 
                            class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Simpan Setoran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
