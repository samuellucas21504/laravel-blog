<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col bg-stone-950 min-h-screen">
    <header class="flex flex-row p-10 justify-between w-full h-16 text-gray-200 text-opacity-80">
        <div class="w-auto h-max text-2xl self-center cursor-pointer hover:text-white">
            <a href="{{route('home')}}">
                <h1>BLOG</h1>
            </a>
        </div>
        <div class="w-auto h-max align-middle self-center">
            <ul class="font-light cursor-pointer">
            @auth
            <li class="hover:text-white mr-2">
                Posts
            </li>
            <li class="hover:text-white mr-2">
                You
            </li>
            <li class="hover:text-white">
                <a href="/logout">
                    Logout
                </a>
            </li>
            @else
            <li class="hover:text-white mr-2">
                <a href="{{route('login')}}">Login</a>
            </li>
            <li class="hover:text-white">
                <a href="{{route('register')}}">Register</a>
            </li>
            @endauth
            </ul>
        </div>
    </header>
    {{$slot}}
    <footer class="flex flex-row justify-center align-middle mt-auto mb-2 w-full bg-neutral-950 text-gray-200 opacity-80">
        All rights reserved - {{date('Y')}}
    </footer>
</body>
</html>
