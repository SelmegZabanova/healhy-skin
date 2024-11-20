<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css">
    <style>
        body {
            background-color: #FFF0F5; /* pastel pink */
        }
        .bg-pink-light {
            background-color: #FFE4E1; /* pastel pink */
        }
        .text-pink-dark {
            color: #CD6090; /* darker pastel pink */
        }
        .hover\:bg-pink-dark:hover {
            background-color: #CD6090; /* darker pastel pink */
        }
        .hover\:text-white:hover {
            color: white;
        }
    </style>
</head>
@auth
    @if(auth()->user()->isAdmin())
        <nav class="bg-pink-100 p-4">
            <div class="container mx-auto">
                <a href="{{ route('admin.welcome') }}" class="text-pink-dark mr-4">Управление постами</a>


            </div>
        </nav>
    @endif
@endauth
<body>
<div class="min-h-screen flex flex-col">
    <header class="bg-pink-light py-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-pink-dark font-bold text-xl">✨HEALTHY SKIN✨</a>
            <nav class="flex items-center">
                <ul class="flex space-x-8 text-pink-dark font-medium">
                    <li><a href="{{route('ingredients')}}" class="hover:bg-pink-dark hover:text-white py-2 px-4 rounded">Проверить состав</a></li>
                    <li><a href="{{ route('reviews') }}" class="hover:bg-pink-dark hover:text-white py-2 px-4 rounded">Отзывы на косметику</a></li>
                </ul>
                <div class="ml-8">
                    <ul class="flex space-x-8 text-pink-dark font-medium">
                        @auth
                            <a href="{{ route('profile') }}" class="hover:bg-pink-dark hover:text-white py-2 px-4 rounded">Profile</a>
                            <form action="/logout" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="hover:bg-pink-dark hover:text-white py-2 px-4 rounded">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}"class="hover:bg-pink-dark hover:text-white py-2 px-4 rounded">Login</a>
                            <a href="{{ route('register') }}" class="hover:bg-pink-dark hover:text-white py-2 px-4 rounded">Register</a>
                        @endauth
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main class="flex-grow container mx-auto py-8">
        @yield('content')
    </main>

    <footer class="bg-pink-light py-4 mt-auto shadow-md">
        <div class="container mx-auto text-center text-pink-dark hover:bg-pink-dark hover:text-white py-2 px-4 rounded">
            &copy; 2024 Forum. All rights reserved.
        </div>
    </footer>
</div>
</body>
</html>
