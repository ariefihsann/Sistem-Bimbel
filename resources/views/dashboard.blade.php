<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 ...">
            {{ __('Dashboard Kustom Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1>Selamat Datang, {{ auth()->user()->name }}!</h1>
            <p>Ini adalah halaman dashboard baru saya.</p>

        </div>
    </div>
</x-app-layout>