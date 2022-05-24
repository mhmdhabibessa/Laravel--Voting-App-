<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans text-gray-900 text-sm bg-gray-100">
        <header class="flex items-center justify-between px-8 py-4">

            <a href="#"><img src="{{ asset('img/logo.png') }}" width="120px" height="150px" alt="logo"></a>
            
            <div class="flex items-center">
                @if (Route::has('login'))
                <div class="px-6 py-4">
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                        </a>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

                <a href=" ">
                    <img src=" https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp" 
                        alt="avatar" class="w-10 h-10 rounded-full">
                </a>
                
            </div>
        </header>

        <main class="container mx-auto max-w-custom flex">
            <div class="w-70 mr-5">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Ea magnam tempore iusto maxime fuga rem nihil molestias non, ipsum velit unde dignissimos obcaecati ducimus numquam? Illum, minus! Fuga distinctio eveniet, quod voluptas quidem corrupti quibusdam labore quam repellendus inventore, cum perferendis. Sed adipisci iure veritatis, in nulla itaque deserunt perspiciatis sint rem voluptas minima non enim cupiditate expedita nesciunt aperiam quo fuga possimus facilis doloremque. Corporis quos pariatur autem odio necessitatibus asperiores tempore quisquam veniam molestiae perferendis harum facilis dicta voluptatibus maiores tenetur atque possimus, distinctio perspiciatis non hic unde?
                Sit praesentium hic eligendi aspernatur id quos veniam illum ea.
            </div>
            <div class="w-175">
                <nav class="flex items-center justify-between text-xs">
                    <ul class="flex uppercase font-semibold space-x-10">
                        <li> <a href="#" class="border-b-4 pb-3 border-blue"> All Ideas(87) </a></li>
                        <li> <a href="#" class="border-b-4 pb-3 transition duration-200 ease-in hover:border-blue"> Considering(60) </a></li>
                        <li> <a href="#" class="border-b-4 pb-3 transition duration-200 ease-in hover:border-blue"> In Progress(1) </a></li>
                    </ul>

                    <ul class="flex uppercase font-semibold space-x-10 ">
                        <li> <a href="#" class="border-b-4 pb-3 border-blue"> Implemented(10) </a></li>
                        <li> <a href="#" class="border-b-4 pb-3 border-blue"> Closed(55) </a></li>
                    </ul>
                    
                </nav>
                 
                <div class="mt-8">
                    {{ $slot }}
                </div>
            </div>

        </main>
    </body>
</html>
