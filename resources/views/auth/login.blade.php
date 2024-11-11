<x-guest-layout>
    <!-- Background Video -->
    <video class="video-bg" autoplay loop muted playsinline>
        <source src="{{ asset('videos/analisis.mp4') }}" type="video/mp4">
        Tu navegador no soporta el elemento de video.
    </video>

    <!-- Authentication Card with Dark Mode Styling -->
    <x-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="custom-logo">
        </x-slot>

        <div class="container">
            <!-- Floating Circles for Subtle Decoration -->
            <div class="background-circle one"></div>
            <div class="background-circle two"></div>

            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Field -->
                <div class="field">
                    <x-label for="email" value="{{ __('Email') }}" class="label" />
                    <x-input id="email" class="input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <!-- Password Field -->
                <div class="field mt-4">
                    <x-label for="password" value="{{ __('Password') }}" class="label" />
                    <x-input id="password" class="input" type="password" name="password" required autocomplete="current-password" />
                </div>

                <!-- Remember Me Checkbox -->
                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center text-gray-300">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ms-2 text-sm">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Forgot Password Link and Login Button -->
                <div class="flex items-center justify-end mt-6">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-400 hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-button class="ms-4 custom-button">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-authentication-card>

    <style>
        /* Background Video Styling */
        .video-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            opacity: 0.7;
        }

        /* Logo Styling */
        .custom-logo {
            width: 100px;
            height: auto;
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
        }
        .custom-logo:hover {
            transform: scale(1.05);
        }

        /* Container Styling with Dark Mode */
        .container {
            max-width: 450px;
            padding: 40px;
            background: rgba(30, 30, 30, 0.95);
            border-radius: 18px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
            position: relative;
            z-index: 1;
            color: #d4d4d4;
            backdrop-filter: blur(8px);
            animation: fadeIn 0.6s ease-out;
        }

        /* Fade-In Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Floating Decorative Circles */
        .background-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 87, 34, 0.1);
            z-index: 0;
            animation: float 6s ease-in-out infinite;
        }

        .background-circle.one {
            width: 100px;
            height: 100px;
            top: -40px;
            right: -40px;
        }

        .background-circle.two {
            width: 150px;
            height: 150px;
            bottom: -60px;
            left: -60px;
            animation-delay: 2s;
        }

        /* Floating animation for circles */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(10px); }
        }

        /* Form Field Styling */
        .field {
            margin-bottom: 1.5em;
        }

        .label {
            font-size: 0.9em;
            color: #aaaaaa;
            margin-bottom: 0.5em;
            display: block;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .input {
            background-color: #222;
            border: 1px solid #444;
            color: #d4d4d4;
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            font-size: 1em;
            transition: all 0.3s ease;
        }

        .input:focus {
            border-color: #FF784E;
            outline: none;
            box-shadow: 0 0 6px rgba(255, 120, 78, 0.5);
        }

        /* Button Styling with Gradient */
        .custom-button {
            padding: 10px 25px;
            border-radius: 8px;
            background: linear-gradient(135deg, #FF5722, #FF784E);
            color: #FFFFFF;
            font-weight: bold;
            box-shadow: 0px 4px 10px rgba(255, 87, 34, 0.5);
            transition: transform 0.3s ease, background 0.3s ease;
        }

        .custom-button:hover {
            transform: translateY(-2px);
            background: #FF784E;
        }

        /* Link Customization */
        .underline {
            color: #FF784E;
            text-decoration: none;
            transition: color 0.3s;
        }

        .underline:hover {
            color: #FFAB91;
        }

        /* General Text Color Adjustments */
        .text-gray-300 {
            color: #aaaaaa;
        }
    </style>
</x-guest-layout>
