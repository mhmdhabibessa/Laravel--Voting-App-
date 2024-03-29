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
        <livewire:styles />
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans text-gray-900 text-sm bg-gray-100">
        <header class="flex items-center justify-between px-8 py-4">

            <a href="/"><img src="{{ asset('img/logo.png') }}" width="120px" height="150px" alt="logo"></a>
            
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
                <div class="border-2 border-blue rounded-xl mt-16 sticky top-6">
                    <div class="text-center px-6 py-2 pt-6">
                        <h3 class="font-semibold "> Add an Idea</h3>
                        <p class="text-xs mt-4"> 
                            @auth
                            Lets us to create idea for to be done us 
                            @else
                            Please Login to Create Idea
                            @endauth
                         </p>
                                
                    </div>
                    @auth
                    
                    <livewire:create-idea />
                    @else
                        <div class="my-6 text-center">
                             <a
                                href="{{ route('login') }}"
                                class="inline-block justify-center w-1/2 h-11 text-xs bg-blue text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                            >
                                <span class="ml-1">Login</span>
                             </a>
                             <a
                             href="{{route('register')}}"
                             class="inline-block mt-4 justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3"
                         >
                                Sign Up
                        </a>
                        </div>
                    @endauth
                  
                </div>
            </div>
            <div class="w-175">
                    <livewire:status-filter />
                 
                <div class="mt-8">
                    {{ $slot }}
                </div>
            </div>

        </main>
        <livewire:scripts />

    </body>
</html>
