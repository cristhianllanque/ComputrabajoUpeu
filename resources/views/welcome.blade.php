<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Métodos de Análisis Multivariado</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">
    <style>
        /* General reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Video background */
        .video-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            opacity: 1; /* Set to 1 for full clarity */
        }

        body {
            font-family: 'Figtree', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #E0E0E0;
            overflow: hidden;
            position: relative;
        }

        /* Container for centered content */
        .container {
            max-width: 600px;
            padding: 40px;
            text-align: center;
            background: rgba(0, 0, 0, 0.8);
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease-in-out;
            position: relative;
            z-index: 1; /* Place container above background */
        }

        .container:hover {
            transform: scale(1.03);
        }

        /* Title styling */
        h1 {
            font-size: 2.5em;
            color: #FF5722;
            margin-bottom: 0.5em;
            text-shadow: 2px 4px 10px rgba(0, 0, 0, 0.5);
        }

        /* Subtitle */
        p {
            font-size: 1.2em;
            color: #CCCCCC;
            margin-bottom: 2em;
            line-height: 1.5;
        }

        /* Button container */
        .buttons {
            display: flex;
            justify-content: center;
            gap: 1em;
        }

        /* Styling for buttons */
        .buttons a {
            font-weight: 500;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            color: #FFFFFF;
            background: #FF5722;
            box-shadow: 0px 4px 15px rgba(255, 87, 34, 0.4);
            transition: background 0.3s, transform 0.3s;
        }

        .buttons a:hover {
            background: #FF784E;
            transform: translateY(-3px);
        }

        /* Footer */
        footer {
            margin-top: 3em;
            font-size: 0.9em;
            color: #B0B0B0;
        }

        footer a {
            color: #FF5722;
            text-decoration: none;
            transition: color 0.3s;
        }

        footer a:hover {
            color: #FF784E;
        }

        /* Responsive design adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 30px;
            }

            h1 {
                font-size: 2em;
            }

            p {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <!-- Background Video -->
    <video class="video-bg" autoplay loop muted playsinline>
        <source src="{{ asset('videos/analisis.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="container">
        <!-- Title and subtitle for the application -->
        <h1>Calculadora de Métodos de Análisis Multivariado</h1>
        <p>Bienvenido a la herramienta avanzada para el análisis de datos multivariados. Inicia sesión para explorar cálculos y obtener análisis detallados.</p>
        
        <!-- Login and Register Buttons -->
        <div class="buttons">
            <a href="{{ route('login') }}">Iniciar Sesión</a>
            <a href="{{ route('register') }}">Registrarse</a>
        </div>
        
        <!-- Footer with Laravel and PHP version (for reference or professional appeal) -->
        <footer>
            Powered by <a href="https://laravel.com" target="_blank">Laravel</a> v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}).
        </footer>
    </div>
</body>
</html>
