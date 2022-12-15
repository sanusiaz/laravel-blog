
@extends('layouts.app')

@section('contents')
<main class="min-w-fit w-2/3 m-auto">
    <div class=" mx-auto">
        <div class="text-center pt-10">
            <h1 class="text-2xl text-gray-700">
                All Articles
            </h1>
            <hr class="border border-1 border-gray-300 mt-10 mb-10">
        </div>

        
    </div>
        <a href="{{ route('blog.create') }}" class="text-sm font-semibold text-white bg-blue-700 transition-all duration-200 hover:bg-blue-900 hover:duration-200 rounded-lg  px-5 py-3">
            Create New Article
        </a>

        {{-- show all blogs / posts --}}

        <section class="py-5">

            @if($posts->hasPages())
                {{ $posts->links() }}
            @endif
            <br>
            @forelse ($posts as $post)
                {{-- Check if the first pst has been hit --}}

                <div class="bg-white shadow-lg border-2 rounded-lg mt-1 mb-3 py-4 px-5 @if($loop->first) bg-blue-500 border-yellow-700 @else border-gray-300 @endif flex gap-3">
                    <img class="w-60 h-40 object-contain" src="@if( str_contains( $post->image_path, 'https://' ) ) {{ $post->image_path }} @else {{ Storage::url($post->image_path) }} @endif" alt="{{ $post->title }}">
                    <div>
                        <a href="{{ route('blog.show', [$post->id]) }}" class="text-black font-semibold text-xl block leading-8">{{ $post->title }}</a>

                        <div class="flex gap-8 flex-col mb-2 relative">
                            <p class="block relative">{{ $post->excerpt }}...</p>
                            <dix class="flex flex-col gap-2 ">
                                <div class="flex gap-3">
                                    <a href="/blog/{{ $post->id }}" class="text-sm font-semibold text-white capitalize px-3 py-2 rounded bg-purple-800 hover:bg-purple-600 duration-200 w-max hover:duration-200 block relative" target="_blank">Read More</a>

                                {{-- Delete post --}}
                                <form method="POST" action="{{ route('blog.delete', [$post->id]) }}" class="block relative">

                                    @method('DELETE')
                                    <button type="submit" class="text-sm font-semibold text-white bg-red-600 px-4 py-2 rounded border border-red-600">Delete</button>

                                    @csrf
                                </form>
                                </div>
                                <p class="block text-xs relative">
                                    {{ $post->min_to_read }} Mins to read... Start Now.
                                </p>
    
                                <p class="block text-xs relative">
                                    {{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}
                                </p>
                            </dix>
                        </div>
                    </div>
                </div>
              
            @empty
                <b class="font-semibold text-center py-5 text-black font-Outfit text-3xl flex place-content-center place-items-center w-full h-[200px] md:h-[300px] ld:h-[400px]">No Article :(</b>
            @endforelse
            
            @if($posts->hasPages())
                {{ $posts->links() }}
            @endif
        </section>
    </main>
@endsection