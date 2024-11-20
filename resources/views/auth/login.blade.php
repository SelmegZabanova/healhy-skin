
@extends('layout')

@section('title', 'Login')

@section('content')
    <div class="flex justify-center items-center h-full">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-pink-dark">Login</h2>
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-pink-dark font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-pink-dark font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" required>
                </div>

                <div class="flex items-center justify-between">
                    <button class="bg-pink-light hover:bg-pink-dark text-pink-dark font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Login
                    </button>
                    <a class="inline-block align-baseline font-bold text-sm text-pink-dark hover:text-pink-darker" href="">
                        Forgot Password?
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
