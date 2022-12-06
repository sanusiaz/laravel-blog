
@extends('layouts.app')

@section('contents')
    <header class="text-center px-5 text-2xl text-white font-semibold capitalize py-8">
        {{ $post->title }}
    </header>
    <main class="min-w-fit w-2/3 m-auto">
        <div class="flex justify-between p-2">
            @if($nextBlog !== null)
            
            @endif
        </div>

        {{-- Featured Image --}}
        <img class="block relative my-5" src="{{ $post->image_path }}" alt="">

        <section class="py-5">

            
        </section>
    </main>
@endsection