<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'TaskBoard') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50 min-h-screen">
        <!-- Modern Background with gradient accent -->
        <div class="min-h-screen flex items-center justify-center px-4 py-12 relative">
            <!-- Red accent gradient -->
            <div class="absolute inset-0 bg-gradient-to-br from-red-500/5 via-transparent to-gray-100"></div>

            <div class="relative w-full max-w-md">
                <!-- Modern Form Container -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-8 hover:shadow-xl transition-all duration-500">
                    <!-- Brand Header -->
                    <div class="text-center mb-8">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">KanbanX</h1>
                        <div class="w-16 h-1 bg-red-500 mx-auto rounded-full"></div>
                        <p class="text-gray-600 text-sm mt-3">Streamline your workflow</p>
                    </div>

                    {{ $slot }}
                </div>

                <!-- Footer -->
                <div class="mt-8 text-center">
                    <p class="text-xs text-gray-500">
                        © 2024 TaskBoard. Built for productivity.
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
