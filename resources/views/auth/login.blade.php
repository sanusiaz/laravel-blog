@extends('layouts.app')

@section('title', 'Login to your account')

@section('contents')
<main class="min-w-fit w-2/3 m-auto h-screen">
    
    <section class="h-full flex place-content-center flex-col place-items-center">
        <form action="{{ route('auth.create') }}" method="post" class="flex flex-col w-full gap-3 sm:w-96">
            <div class="font-semibold text-lg text-center text-black py-3 font-Poppins">Login to your account</div>
            <label for="email" class="peer">
                <input type="email" class="border-2 rounded valid:focus:border-amber-300 px-5 text-sm py-3 placeholder:text-gray-800 w-full outline-none peer-focus:border-red-700 invalid:focus:border-red-700 @error('email') border-red-700 @else border-gray-300 @enderror" placeholder="Enter a valid email address" name="email" id="email">
                @error('email')
                    <span class="text-xs text-red-600 mb-2">{{ $message }}</span>
                @enderror
            </label>


            <label for="password" class="password">
                <input type="password" class="border-2 rounded valid:focus:border-amber-300 px-5 text-sm py-3 placeholder:text-gray-800 w-full outline-none peer-focus:border-red-700 invalid:focus:border-red-700 @error('password') border-red-700 @else border-gray-300 @enderror" placeholder="Enter your password" name="password" id="password">
                @error('password')
                    <span class="text-xs text-red-600 mb-2">{{ $message }}</span>
                @enderror
            </label>

            <label for="remember_me" class="remember_me flex gap-2 cursor-pointer">
                <input type="checkbox" class="border-2 rounded checked:bg-amber-600 aria-checked:bg-amber-300 outline-none border-none block " name="remember_me" id="remember_me">
                
                <span class="block">Remember Me</span>
            </label>

            <label for="submit">
                <button id="submit" class="border-2 hover:bg-amber-600 duration-200 hover:duration-200 transition-all rounded bg-amber-800 text-white font-Poppins valid:focus:border-amber-300 px-5 text-sm py-3 placeholder:text-gray-800 w-full outline-none peer-focus:border-red-700 invalid:focus:border-red-700">Login</button>
            </label>

            @csrf
            <div class="flex p-1 text-sm w-full justify-between">
                <a href="{{ route('auth.register') }}" class="text-blue-600 underline">Create an account</a>
                <a href="{{ route('auth.forget_password') }}" class="text-blue-600 underline">Change Password</a>
            </div>
        </form>
    </section>
</main>
@endsection