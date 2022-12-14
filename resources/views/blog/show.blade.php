
@extends('layouts.app')

@section('contents')
<div class="w-4/5 mx-auto">

    <div class="flex justify-between p-2">
        @if($prevBlog !== null)
            <a href="{{ route('blog.show', [$prevBlog]) }}" class="py-2 px-4 rounded-lg text-sm text-white font-semibold bg-blue-600 hover:bg-blue-800 duration-200 hover:duration-200">Prev</a>
        @endif

        @if($nextBlog !== null)
        <a href="{{ route('blog.show', [$nextBlog]) }}" class="py-2 px-4 rounded-lg text-sm text-white font-semibold bg-blue-600 hover:bg-blue-800 duration-200 hover:duration-200">Next</a>
    @endif
    </div>

    {{-- Featured Image --}}
    <img class="block relative my-5 max-w-xl object-contain" src="@if( str_contains( $post->image_path, 'https://' ) ) {{ $post->image_path }} @else {{ Storage::url($post->image_path) }} @endif">

    <h4 class="text-left font-Poppins uppercase sm:text-left text-2xl font-bold text-gray-900 py-10 sm:py-20">
        {{ $post->title }}
    </h4>

    <div class="block lg:flex flex-row">
        <div class="basis-9/12 text-center sm:block sm:text-left">
            <span class="text-left sm:inline block text-gray-900 pb-10 sm:pt-0 pt-0  pl-0 sm:pl-4 -mt-8 sm:-mt-0">
                Made by:
                <a
                    href=""
                    class="font-bold text-green-500 italic hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all py-20">
                    {{-- {{ $post->user->name }} --}}
                </a>
                &nbsp;
                Created: 
                {{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}
            </span>
        </div>
    </div>

    <div class="pt-10 pb-10 text-gray-900 text-xl">
        <p class="font-bold text-2xl text-black pt-10">
            {{ $post->excerpt }}
        </p>

        <p class="text-base text-black pt-10">
            {{ $post->body }}
        </p>
    </div>

    <a href="{{ route('blog.edit', [$post->id]) }}" class="bg-blue-800 transiton-all hover:bg-blue-600 duration-200 hover:duration-200 py-3 cursor-pointer text-sm text-white font-semibold font-Poppins rounded border border-blue-600 w-max px-7">
        Edit Post
    </a>
</div>
@endsection