
@extends('layouts.app')

@section('contents')
    
    <main class="w-2/3 overflow-hidden m-auto">
        <div class="flex justify-between p-2">
            @if($prevBlog !== null)
                <a href="{{ route('blog.show', [$prevBlog]) }}" class="py-2 px-4 rounded-lg text-sm text-white font-semibold bg-blue-600 hover:bg-blue-800 duration-200 hover:duration-200">Prev</a>
            @endif

            @if($nextBlog !== null)
            <a href="{{ route('blog.show', [$nextBlog]) }}" class="py-2 px-4 rounded-lg text-sm text-white font-semibold bg-blue-600 hover:bg-blue-800 duration-200 hover:duration-200">Next</a>
        @endif
        </div>

        {{-- Featured Image --}}
        <img class="block relative my-5 max-w-xl object-contain" src="{{ $post->image_path }}" alt="">

        {{-- Posts title --}}
        <div class="text-left text-2xl text-slate-900 px-0 font-semibold capitalize py-8">
            {{ $post->title }}
        </div>

        <section class="py-5">

            <p class="block relative py-5 pb-10">
                <span class="block relative text-left font-semibold text-xl">The Excerpt</span>
                <span class="block relative">{{ $post->excerpt }}</span>
            </p>
            
            <p class="block relative py-5">
                <span class="block text-left font-semibold text-xl">The Body</span>
                <span class="break-words block relative">{{ $post->body }}</span>
            </p>
        </section>
    </main>
@endsection