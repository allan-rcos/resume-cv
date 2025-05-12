<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$title??'ResumeCV'}}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <link rel="icon" href="{{asset('assets/images/logo.svg')}}" sizes="any" type="image/svg+xml">
</head>
<body class="bg-gray-50">
<nav class="h-20 flex flex-wrap items-center justify-between p-4 fixed top-0 w-screen border-gray-200 bg-white/50">
    <a href="{{route('home')}}" class="flex gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor" class="text-blue-500 w-10"><path d="M620-163 450-333l56-56 114 114 226-226 56 56-282 282Zm220-397h-80v-200h-80v120H280v-120h-80v560h240v80H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h167q11-35 43-57.5t70-22.5q40 0 71.5 22.5T594-840h166q33 0 56.5 23.5T840-760v200ZM480-760q17 0 28.5-11.5T520-800q0-17-11.5-28.5T480-840q-17 0-28.5 11.5T440-800q0 17 11.5 28.5T480-760Z"/></svg>
        <span class="text-3xl font-semibold">ResumeCV</span>
    </a>
    <div class="mr-2">
        <ul class="flex gap-5 py-2 px-3 text-white bg-blue-700 rounded-sm md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500">
            <x-main-nav-link route="home">Home</x-main-nav-link>
        </ul>
    </div>
</nav>
<main>
    {{$slot}}
</main>
<footer class="w-full text-gray-700 bg-white body-font">
    <div
        class="container flex flex-col flex-wrap px-5 py-24 mx-auto md:items-center lg:items-start md:flex-row md:flex-no-wrap">
        <div class="flex-shrink-0 w-64 mx-auto text-center md:mx-0 md:text-left">
            <a class="flex items-center justify-center font-medium text-gray-900 text-2xl title-font md:justify-start">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor" class="text-blue-500 w-8"><path d="M620-163 450-333l56-56 114 114 226-226 56 56-282 282Zm220-397h-80v-200h-80v120H280v-120h-80v560h240v80H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h167q11-35 43-57.5t70-22.5q40 0 71.5 22.5T594-840h166q33 0 56.5 23.5T840-760v200ZM480-760q17 0 28.5-11.5T520-800q0-17-11.5-28.5T480-840q-17 0-28.5 11.5T440-800q0 17 11.5 28.5T480-760Z"/></svg>
                ResumeCV
            </a>
            <p class="mt-2 text-sm text-gray-500">CV, Portfólio e Resume!</p>
            <div class="mt-4 text-xl">
                <span class="inline-flex gap-3 justify-center mt-2 sm:ml-auto sm:mt-0 sm:justify-start">
                    <a class="cursor-pointer hover:shadow-xl">
                        <i class="icon ion-social-facebook"></i>
                    </a>
                    <a class="cursor-pointer hover:shadow-xl">
                        <i class="icon ion-social-twitter"></i>
                    </a>
                    <a class="cursor-pointer hover:shadow-xl">
                        <i class="icon ion-social-github"></i>
                    </a>
                    <a class="cursor-pointer hover:shadow-xl">
                        <i class="icon ion-social-linkedin"></i>
                    </a>
                </span>
            </div>
        </div>
        <div class="flex flex-wrap flex-grow justify-end mt-10 -mb-10 text-center md:pl-20 md:mt-0 md:text-left">
            <div class="w-full px-4 lg:w-1/4 md:w-1/2">
                <h2 class="mb-3 text-sm font-medium tracking-widest text-gray-900 uppercase title-font">Suporte</h2>
                <ul class="mb-10 list-none">
                    <li class="mt-3">
                        <a class="text-gray-500 cursor-pointer hover:text-gray-900">Ajuda com Recursos</a>
                    </li>
                    <li class="mt-3">
                        <a class="text-gray-500 cursor-pointer hover:text-gray-900">Atualização mais Recente</a>
                    </li>
                </ul>
            </div>
            <div class="w-full px-4 lg:w-1/4 md:w-1/2">
                <h2 class="mb-3 text-sm font-medium tracking-widest text-gray-900 uppercase title-font">Plataforma
                </h2>
                <ul class="mb-10 list-none">
                    <li class="mt-3">
                        <a class="text-gray-500 cursor-pointer hover:text-gray-900">Termos &amp; Privacidade</a>
                    </li>
                    <li class="mt-3">
                        <a class="text-gray-500 cursor-pointer hover:text-gray-900" href="{{route('home')}}#pricing">Preços</a>
                    </li>
                    <li class="mt-3">
                        <a class="text-gray-500 cursor-pointer hover:text-gray-900">FAQ</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bg-gray-200">
        <div class="container px-5 py-4 mx-auto">
            <p class="text-sm text-gray-700 capitalize xl:text-center"> &copy; Ricardo Állan Costa - 2025</p>
        </div>
    </div>
</footer>
</body>
</html>
