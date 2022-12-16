@extends('layouts.app')


@section('title', 'Admin Dashboard - Create User')

@section('contents')
    <main class="w-full h-screen">
        @include('layouts.header')


        <section class="p-4 max-w-fit w-1/3 m-auto h-full flex w-full">
            <form  
            method="POST" 
            class="py-5 flex flex-col gap-5"
            enctype="multipart/form-data">

            @include('admin.users.form')
            <button 
                type="submit"
                class="bg-green-700 text-sm font-semibold text-white transition-all duration-200 hover:duration-200 hover:bg-green-900 py-2 rounded-lg px-5 w-max">Create</button>
            </form>
        </section>
    </main>
@endsection