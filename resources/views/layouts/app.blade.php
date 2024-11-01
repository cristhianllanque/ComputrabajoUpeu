<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    <style>
        /* Estilos personalizados */
        body {
            background-color: #1a1a2e;
            color: #e0e0e0;
            font-family: 'Figtree', sans-serif;
        }
        .sidebar {
            background-color: #5a0b0b; /* Rojo oscuro */
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .sidebar h2 {
            font-size: 24px;
            color: #ffdd57; /* Dorado */
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .sidebar nav a {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: #ffffff;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.3s, color 0.3s;
            border-radius: 5px;
        }
        .sidebar nav a:hover {
            background-color: #ffdd57;
            color: #5a0b0b;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
        }
        header {
            background-color: #202040;
            color: #e0e0e0;
        }
        .profile-menu {
            padding: 20px;
        }
        .profile-menu a {
            display: block;
            text-align: center;
            color: #ffffff;
            background-color: #c1272d; /* Rojo vibrante */
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .profile-menu a:hover {
            background-color: #ff3838; /* Rojo claro */
        }
        /* Botón de Cerrar Sesión */
        .logout-button {
            background-color: #ff5e57; /* Rojo anaranjado */
            color: #ffffff;
            text-align: center;
            font-weight: bold;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .logout-button:hover {
            background-color: #e03b3b;
        }
        /* Estilo del encabezado de contenido */
        .content-header {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ffdd57;
            padding-bottom: 10px;
            border-bottom: 2px solid #5a0b0b;
            margin-bottom: 20px;
        }
        /* Animación sutil para enlaces */
        a {
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <x-banner />

    <!-- Sidebar de navegación -->
    <div class="sidebar">
        <h2>Menú Principal</h2>
        <nav>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('metodo.ingenuo') }}">Método Ingenuo</a>
            <a href="{{ route('metodo.media') }}">Método de la Media</a>
            <a href="{{ route('metodo.media_movil') }}">Método de la Media Móvil</a>
            <a href="{{ route('metodo.derivada') }}">Método de la Derivada</a>
            <a href="{{ route('metodo.ingenuo_estacional') }}">Método Ingenuo Estacional</a>
        </nav>

        <!-- Opciones de perfil y cerrar sesión -->
        <div class="profile-menu">
            <a href="{{ route('profile.show') }}">Perfil</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout-button">Cerrar Sesión</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </div>

    <!-- Contenido principal -->
    <div class="content">
        <!-- Page Heading -->
        @if (isset($header))
            <header class="content-header">
                {{ $header }}
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')
    @livewireScripts
</body>
</html>
