@extends('layout')



@section('content')
<div class="min-h-screen flex items-center justify-center  bg-opacity-75">
    <div class="bg-transparent p-8 rounded-lg shadow-neon border-2 border-neon-500 w-full max-w-md">
        <h2 class="text-3xl font-bold text-center mb-6 text-neon-500">Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-6">
                <label class="block text-neon-400 text-sm font-bold mb-2">Email</label>
                <input type="email" name="email" class="w-full px-4 py-2 bg-transparent border-2 border-neon-500 rounded-lg text-neon-300 placeholder-neon-700 focus:outline-none focus:border-neon-300" placeholder="Enter your email" required>
            </div>

            <div class="mb-6">
                <label class="block text-neon-400 text-sm font-bold mb-2">Password</label>
                <input type="password" name="password" class="w-full px-4 py-2 bg-transparent border-2 border-neon-500 rounded-lg text-neon-300 placeholder-neon-700 focus:outline-none focus:border-neon-300" placeholder="Enter your password" required>
            </div>

            <button type="submit" class="w-full bg-neon-500 text-black font-bold py-2 px-4 rounded-lg hover:bg-neon-400 transition duration-300">Login</button>

            @if ($errors->any())
                <div class="mt-6 bg-transparent border-2 border-neon-500 p-4 rounded-lg text-neon-300">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection