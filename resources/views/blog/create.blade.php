
@extends('layouts.app')

@section('contents')
<main class="min-w-fit w-2/3 m-auto">
    <div class=" mx-auto">
        <div class="text-center pt-10">
            <h1 class="text-2xl text-gray-700">
                Create New Article
            </h1>
            <hr class="border border-1 border-gray-300 mt-10 mb-10">
        </div>

        
    </div>
        <a href="{{ route('blog.index') }}" class="text-sm font-semibold text-white bg-blue-700 transition-all duration-200 hover:bg-blue-900 hover:duration-200 block w-max rounded-lg  px-5 py-3">
            List all Article
        </a>

        <form action="{{ route('blog.store') }}" method="post" class="py-5 flex flex-col gap-5">
            <label for="title" class="peer">
                <input type="text" class="border border-gray-300 rounded valid:outline-amber-300 px-5 text-sm py-3 placeholder:text-gray-800 w-full peer-focus:outline-red-700 invalid:outline-red-700" placeholder="Enter Posts title" name="title" id="title">
            </label>

            <label for="slug" class="peer">
                <input readonly type="text" class="border border-gray-300 rounded valid:outline-amber-300 px-5 text-sm py-3 placeholder:text-gray-800 w-full peer-focus:outline-red-700 invalid:outline-red-700" placeholder="Start Tying the posts title" name="slug" id="slug">
            </label>

            <label for="status" class="peer">

                <select class="border border-gray-300 rounded valid:outline-amber-300 px-5 text-sm py-3 placeholder:text-gray-800 w-full peer-focus:outline-red-700 invalid:outline-red-700" placeholder="Enter Posts title" name="status" id="status">
                    <option value="published">Published</option>
                    <option value="drafts">Drafts</option>
                </select>
                
            </label>

            <label for="excerpt" class="peer">
                <textarea rows="8" cols="10" class="border border-gray-300 rounded  px-5 text-sm py-3 placeholder:text-gray-800 w-full valid:outline-amber-300 peer-focus:outline-red-700 invalid:outline-red-600" placeholder="Enter Excerpt" name="excerpt" id="excerpt"></textarea>
            </label>
            <label for="body" class="peer">
                <textarea rows="13" cols="10" class="border border-gray-300 rounded  px-5 text-sm py-3 placeholder:text-gray-800 w-full valid:outline-amber-300 peer-focus:outline-red-700 invalid:outline-red-600" placeholder="Enter Body" name="body" id="body"></textarea>
            </label>

            <label for="image">
                <input type="file" class="file:bg-blue-600 file:text-white file:font-Poppins file:rounded-lg file:px-4 file:text-sm file:py-3 file:cursor-pointer" name="image" id="image">
            </label>

            <button type="submit" class="bg-green-700 text-sm font-semibold text-white transition-all duration-200 hover:duration-200 hover:bg-green-900 py-2 rounded-lg px-5 w-max">Create</button>

            @csrf
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