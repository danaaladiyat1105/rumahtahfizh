<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
            {{ __('D A S H B O A R D') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Total Santri -->
                <x-responsive-nav-link :href="route('data-santri')" :active="request()->routeIs('data-santri')">
                    <div class="card">
                        <img src="{{ asset('images/people.png') }}" alt="logo" />
                        <h6 class="text-lg font-semibold">TOTAL SANTRI</h6>
                        <p class="text-4xl font-bold mt-2">{{ $totalSantri }}</p>
                    </div>
                    </x-nav-link>                <!-- Total Santri -->
                <!-- Kehadiran -->
                <x-responsive-nav-link :href="route('absensi')" :active="request()->routeIs('absensi')">
                    <div class="card">
                        <img src="{{ asset('images/people.png') }}" alt="logo" />
                        <h6 class="text-lg font-semibold">Kehadiran</h6>
                        <p class="text-4xl font-bold mt-2"></p>
                    </div>
                </x-nav-link> 

                <!-- Tahfiz -->
                <x-responsive-nav-link :href="route('tahfizh')" :active="request()->routeIs('tahfizh')">
                    <div class="card">
                        <img src="{{ asset('images/people.png') }}" alt="logo" />
                        <h6 class="text-lg font-semibold">Tahfiz</h6>
                        <p class="text-4xl font-bold mt-2"></p>
                    </div>
                </x-nav-link> 

                <!-- Evaluasi Santri -->
                <div class="card">
                    <img src="{{ asset('images/people.png') }}" alt="logo" />
                    <h6 class="text-lg font-semibold">Evaluasi Santri</h6>
                    <p class="text-4xl font-bold mt-2"></p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
