
@extends('layouts.app')

@section('contents')
<main class="min-w-fit w-2/3 m-auto">
    <div class=" mx-auto">
        <div class="text-center pt-10">
            <h1 class="text-2xl text-gray-700">
                Edit {{ $post->title }}
            </h1>
            <hr class="border border-1 border-gray-300 mt-10 mb-10">
        </div>

        
    </div>
        <a href="{{ route('blog.index') }}" class="text-sm font-semibold text-white bg-blue-700 transition-all duration-200 hover:bg-blue-900 hover:duration-200 block w-max rounded-lg  px-5 py-3">
            List all Article
        </a>

        <form 
            action="{{ route('blog.update', [$post->id]) }}" 
            method="POST" 
            class="py-5 flex flex-col gap-5"
            enctype="multipart/form-data">
            @method('PATCH')
            @include('blog.form')

            <button type="submit" class="bg-green-700 text-sm font-semibold text-white transition-all duration-200 hover:duration-200 hover:bg-green-900 py-2 rounded-lg px-5 w-max">Update</button>

        </form>
    </main>

    <script>
        $(document).ready(function () {
            $("form input[id=title]").keyup(function (){
                let __val = $(this).val().split(" ").join("_");
                $("form input[id=slug]").val(`${__val}`)
            })
        })
    </script>
@endsection