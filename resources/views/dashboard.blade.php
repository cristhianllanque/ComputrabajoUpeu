<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-yellow-500 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 text-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="mb-6">
                    <h3 class="text-3xl font-bold text-yellow-500">¡Bienvenido al Dashboard!</h3>
                    <p class="text-gray-300 mt-2">Aquí puedes acceder a los distintos métodos de pronóstico y revisar el estado de tu proyecto.</p>
                </div>

                <!-- Contenido de bienvenida personalizado -->
                <div class="bg-gray-700 p-4 rounded-lg">
                    <h4 class="text-xl font-semibold text-yellow-400">Resumen del Proyecto</h4>
                    <p class="text-gray-300 mt-2">
                        Utiliza los métodos de pronóstico para obtener predicciones precisas y realizar análisis sobre los datos históricos. Selecciona uno de los métodos en el menú lateral.
                    </p>
                </div>

                <!-- Links a las herramientas y métodos de pronóstico -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                    <a href="{{ route('metodo.ingenuo') }}" class="bg-red-600 hover:bg-red-700 transition p-4 rounded-lg shadow-lg text-center">
                        <h5 class="text-lg font-semibold text-white">Método Ingenuo</h5>
                    </a>
                    <a href="{{ route('metodo.media') }}" class="bg-red-600 hover:bg-red-700 transition p-4 rounded-lg shadow-lg text-center">
                        <h5 class="text-lg font-semibold text-white">Método de la Media</h5>
                    </a>
                    <a href="{{ route('metodo.media_movil') }}" class="bg-red-600 hover:bg-red-700 transition p-4 rounded-lg shadow-lg text-center">
                        <h5 class="text-lg font-semibold text-white">Método de la Media Móvil</h5>
                    </a>
                    <a href="{{ route('metodo.derivada') }}" class="bg-red-600 hover:bg-red-700 transition p-4 rounded-lg shadow-lg text-center">
                        <h5 class="text-lg font-semibold text-white">Método de la Derivada</h5>
                    </a>
                    <a href="{{ route('metodo.ingenuo_estacional') }}" class="bg-red-600 hover:bg-red-700 transition p-4 rounded-lg shadow-lg text-center">
                        <h5 class="text-lg font-semibold text-white">Método Ingenuo Estacional</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
