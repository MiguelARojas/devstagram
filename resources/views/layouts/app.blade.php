<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DevStagram - @yield('titulo')</title>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-300">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="font-bold text-3xl"> DevStagram </h1>
                <nav class="flex gap-4 items-center">
                    <a href="#" class="font-bold uppercase text-gray-900 text-sm"> Login </a>
                    <a href="/register" class="font-bold uppercase text-gray-900 text-sm"> Register </a>
                </nav>
            </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="text-center font-black text-4xl mt-10 mb-4"> @yield('titulo') </h2>
            @yield('contenido')
        </main>
        <footer class="text-right mr-3 mt-96 uppercase text-gray-800 font-bold">
            <a> DevStagram ~ @yield('footer') ~  {{ now()->year}}</a>
        </footer>

    </body>
</html>