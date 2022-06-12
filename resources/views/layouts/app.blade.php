<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/css/selectize.min.css" integrity="sha512-zSutnLmqtlWVx0A5NdW8YwshpUETPzJ6YBAvb+bkE0QbVKopS0ACPjE6QY6F9aFPSowfiho+hgeQh095FRPj5A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script
            src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
            integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
            crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/js/standalone/selectize.min.js" integrity="sha512-JFjt3Gb92wFay5Pu6b0UCH9JIOkOGEfjIi7yykNWUwj55DBBp79VIJ9EPUzNimZ6FvX41jlTHpWFUQjog8P/sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <style>
            .selectize-input {
                border-radius: 0.375rem;
                border: 1px solid rgb(209 213 219);
                appearance: none;
                background-color: #fff;
                padding-top: 0.5rem;
                padding-right: 0.75rem;
                padding-bottom: 0.5rem;
                padding-left: 0.75rem;
                line-height: 1.5rem;
            }
            .selectize-input > input{
                width: 300px !important;
            }
            .selectize-input input::placeholder {
                color: rgb(209 213 219);
                font-size: 1rem;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen flex flex-col">
            @include('layouts.navigation')

            <main class="flex-1 mt-8">
                <x-container>
                    @yield('main')
                </x-container>
            </main>

            <footer class="bg-slate-200 mt-14 py-6">
                <x-container>
                    <div class="flex items-center justify-between">
                        <div>&copy; Michael Farquhar {{date('Y')}}</div>
                        <a class="underline" href="https://github.com/MichaelFarquhar/laravel-qna-forum" target="_blank">Source Code</a>
                    </div>
                </x-container>
            </footer>
        </div>
    </body>
</html>
