<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-yellow-400 leading-tight tracking-wide">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 bg-opacity-80 backdrop-blur-md text-white overflow-hidden shadow-2xl sm:rounded-xl p-8">
                <div class="mb-10 text-center">
                    <h3 class="text-4xl font-bold text-yellow-400 tracking-wide">¡Bienvenido al Dashboard!</h3>
                    <p class="text-gray-300 mt-3 text-lg">Accede a los métodos de pronóstico y revisa el estado de tu proyecto en esta plataforma intuitiva.</p>
                </div>

                <!-- Project Summary with Glassy Effect -->
                <div class="bg-gray-800 bg-opacity-60 p-6 rounded-lg mb-8 shadow-lg">
                    <h4 class="text-2xl font-semibold text-yellow-300">Resumen del Proyecto</h4>
                    <p class="text-gray-300 mt-2 leading-relaxed">
                        Utiliza los métodos de pronóstico para obtener predicciones precisas y realizar análisis sobre los datos históricos. Selecciona uno de los métodos en el menú lateral.
                    </p>
                </div>

                <!-- Forecasting Tools and Methods Links -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
                    <a href="{{ route('metodo.ingenuo') }}" class="tool-card">
                        <h5 class="text-lg font-semibold text-white">Método Ingenuo</h5>
                    </a>
                    <a href="{{ route('metodo.media') }}" class="tool-card">
                        <h5 class="text-lg font-semibold text-white">Método de la Media</h5>
                    </a>
                    <a href="{{ route('metodo.media_movil') }}" class="tool-card">
                        <h5 class="text-lg font-semibold text-white">Método de la Media Móvil</h5>
                    </a>
                    <a href="{{ route('metodo.derivada') }}" class="tool-card">
                        <h5 class="text-lg font-semibold text-white">Método de la Derivada</h5>
                    </a>
                    <a href="{{ route('metodo.ingenuo_estacional') }}" class="tool-card">
                        <h5 class="text-lg font-semibold text-white">Método Ingenuo Estacional</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Background Gradient Styling */
        .bg-gradient-to-b {
            background: linear-gradient(to bottom, #1a1a1a, #222222, #1a1a1a);
        }

        /* Header and Title Styling */
        h2, h3 {
            color: #FFD700;
            text-transform: uppercase;
        }

        /* Tool Card Styling */
        .tool-card {
            background: linear-gradient(135deg, #FF5722, #FF784E);
            color: #FFFFFF;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            transition: transform 0.3s ease, background 0.3s ease;
            box-shadow: 0px 4px 20px rgba(255, 87, 34, 0.4);
            position: relative;
            overflow: hidden;
        }

        .tool-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 50%;
            width: 150%;
            height: 200%;
            background: rgba(255, 255, 255, 0.15);
            transform: translateX(-50%) rotate(45deg);
            transition: all 0.3s ease;
            border-radius: 50%;
            pointer-events: none;
        }

        .tool-card:hover {
            transform: scale(1.05);
        }

        .tool-card:hover::before {
            width: 180%;
            height: 220%;
            background: rgba(255, 255, 255, 0.25);
        }

        /* Glassy, Soft Glow Effects for Container */
        .bg-opacity-80 {
            background: rgba(30, 30, 30, 0.85);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Text Styling for Readability */
        .text-yellow-400, .text-yellow-300 {
            color: #FFD700;
        }

        .text-gray-300 {
            color: #d1d1d1;
        }

        /* Subtle Shadows and Hover Effects */
        h3, h4 {
            font-weight: 600;
            letter-spacing: 0.5px;
        }
    </style>
</x-app-layout>
