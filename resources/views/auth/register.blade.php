@extends('layouts.app')

@section('title', 'Create an account')

@section('contents')
<main class="min-w-fit w-2/3 m-auto h-screen">
    
    <section class="h-full flex place-content-center place-items-center">
        <form action="{{ route('auth.store') }}" method="POST" class="flex flex-col w-full gap-3 sm:w-96">
            <div class="font-semibold text-lg text-center text-black py-3 font-Poppins">Create an Account</div>
            <label for="name" class="peer">
                <input type="name" class="border-2 rounded valid:focus:border-amber-300 px-5 text-sm py-3 placeholder:text-gray-800 w-full outline-none peer-focus:border-red-700 invalid:focus:border-red-700 @error('name') border-red-700 @else border-gray-300 @enderror" placeholder="Enter your username" name="name" id="name">
                @error('name')
                    <span class="text-xs text-red-600 mb-2">{{ $message }}</span>
                @enderror
            </label>
            
            <label for="email" class="peer">
                <input type="email" class="border-2 rounded valid:focus:border-amber-300 px-5 text-sm py-3 placeholder:text-gray-800 w-full outline-none peer-focus:border-red-700 invalid:focus:border-red-700 @error('email') border-red-700 @else border-gray-300 @enderror" placeholder="Enter a valid email address" name="email" id="email">
                @error('email')
                    <span class="text-xs text-red-600 mb-2">{{ $message }}</span>
                @enderror
            </label>


            <label for="password" class="password">
                <input type="password" class="border-2 rounded valid:focus:border-amber-300 px-5 text-sm py-3 placeholder:text-gray-800 w-full outline-none peer-focus:border-red-700 invalid:focus:border-red-700 @error('password') border-red-700 @else border-gray-300 @enderror" placeholder="Enter your password" name="password" id="password">
                <small class="text-xs text-slate-500 ">
                    Password must be at least 8 characters long <br>
                    at least one letter, one special character and one number
                </small>
                @error('password')
                    <span class="text-xs text-red-600 mb-2">{{ $message }}</span>
                @enderror
            </label>

            <label for="submit">
                <button id="submit" class="border-2 hover:bg-amber-600 duration-200 hover:duration-200 transition-all rounded bg-amber-800 text-white font-Poppins valid:focus:border-amber-300 px-5 text-sm py-3 placeholder:text-gray-800 w-full outline-none peer-focus:border-red-700 invalid:focus:border-red-700">Register</button>
            </label>

            @csrf

            <div class="flex p-1 text-sm w-full justify-between">
                <a href="{{ route('auth.index') }}" class="text-blue-600 underline">Login to your account</a>
                <a href="{{ route('auth.forget_password') }}" class="text-blue-600 underline">Change Password</a>
            </div>
        </form>
    </section>
</main>
@endsection