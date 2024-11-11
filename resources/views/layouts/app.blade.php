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
        /* Base Styling */
        body {
            background-color: #1a1a2e;
            color: #e0e0e0;
            font-family: 'Figtree', sans-serif;
            display: flex;
            min-height: 100vh;
            margin: 0;
        }

        /* Sidebar Styling */
        .sidebar {
            position: fixed;
            width: 260px;
            height: 100vh;
            background: linear-gradient(135deg, #5a0b0b, #3e0505);
            color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding-top: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            z-index: 1;
        }

        /* Video Background for Sidebar */
        .sidebar-video-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            opacity: 0.4;
        }

        .sidebar h2 {
            font-size: 24px;
            color: #ffdd57;
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
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.05);
            margin: 5px 15px;
        }

        .sidebar nav a:hover {
            background-color: #ffdd57;
            color: #5a0b0b;
            transform: translateX(5px);
        }

        /* Main Content Styling */
        .content {
            margin-left: 260px;
            padding: 20px;
            width: calc(100% - 260px);
            background-color: #202040;
            min-height: 100vh;
            overflow-y: auto;
        }

        /* Header Styling */
        header {
            background-color: #202040;
            color: #ffdd57;
            padding: 20px;
            border-bottom: 2px solid #5a0b0b;
        }

        /* Profile Menu Styling */
        .profile-menu {
            padding: 20px;
        }

        .profile-menu a {
            display: block;
            text-align: center;
            color: #ffffff;
            background-color: #c1272d;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .profile-menu a:hover {
            background-color: #ff3838;
        }

        /* Logout Button */
        .logout-button {
            background-color: #ff5e57;
            color: #ffffff;
            text-align: center;
            font-weight: bold;
            padding: 10px;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        .logout-button:hover {
            background-color: #e03b3b;
        }

        /* Content Header Styling */
        .content-header {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ffdd57;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #5a0b0b;
        }

        /* Subtle Link Animation */
        a {
            transition: all 0.3s ease;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }
            .content {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body class="font-sans antialiased">
    <x-banner />

    <!-- Sidebar Navigation with Video Background -->
    <div class="sidebar">
        <video class="sidebar-video-bg" autoplay loop muted playsinline>
            <source src="{{ asset('videos/analisis.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <h2>Menú Principal</h2>
        <nav>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('metodo.ingenuo') }}">Método Ingenuo</a>
            <a href="{{ route('metodo.media') }}">Método de la Media</a>
            <a href="{{ route('metodo.media_movil') }}">Método de la Media Móvil</a>
            <a href="{{ route('metodo.derivada') }}">Método de la Derivada</a>
            <a href="{{ route('metodo.ingenuo_estacional') }}">Método Ingenuo Estacional</a>
        </nav>

        <!-- Profile Menu Options and Logout Button -->
        <div class="profile-menu">
            <a href="{{ route('profile.show') }}">Perfil</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout-button">Cerrar Sesión</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </div>

    <!-- Main Content Area -->
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
