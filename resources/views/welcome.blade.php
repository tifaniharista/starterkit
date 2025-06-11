<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Portal System</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            .gradient-bg {
                background: linear-gradient(135deg, #6b73ff 0%, #000dff 100%);
            }
            .btn-primary {
                background: linear-gradient(135deg, #6b73ff 0%, #000dff 100%);
                transition: all 0.3s ease;
            }
            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 20px rgba(0, 13, 255, 0.2);
            }
            .btn-outline {
                transition: all 0.3s ease;
            }
            .btn-outline:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            }
            .portal-title {
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
        </style>
    </head>
    <body class="min-h-screen bg-gray-50 flex flex-col items-center justify-center p-6">
        <div class="w-full max-w-md mx-auto text-center mb-12">
            <h1 class="text-5xl font-bold text-gray-800 portal-title mb-4">Portal System</h1>
            <p class="text-lg text-gray-600">Welcome to our platform. Please sign in or create an account.</p>
        </div>

        <div class="w-full max-w-md bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="gradient-bg py-6 px-8 text-center">
                <h2 class="text-2xl font-semibold text-white">Get Started</h2>
            </div>

            <div class="p-8">
                @if (Route::has('login'))
                    <div class="space-y-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="block w-full btn-primary text-white font-medium py-3 px-4 rounded-lg text-center">
                                Go to Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="block w-full btn-primary text-white font-medium py-3 px-4 rounded-lg text-center">
                                Login
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="block w-full btn-outline border border-blue-500 text-blue-500 font-medium py-3 px-4 rounded-lg text-center hover:bg-blue-50">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>

        <div class="mt-12 text-center text-gray-500 text-sm">
            <p>© {{ date('Y') }} Portal System. All rights reserved.</p>
        </div>
    </body>
</html>
