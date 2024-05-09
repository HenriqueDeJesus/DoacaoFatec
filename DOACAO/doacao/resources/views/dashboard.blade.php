<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>

    <script>
        // Obtenha os itens da sessão do local storage
        const sessionData = JSON.parse(localStorage.getItem('laravel_session'));

        // Exiba os itens no console
        console.log('Itens da Sessão:', sessionData);
    </script>
</x-app-layout>
