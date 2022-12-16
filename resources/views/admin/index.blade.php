@extends('layouts.app')


@section('title', 'Admin Dashboard')

@section('contents')
    <main>
        @include('layouts.header')


        <section>
            @if ( count($posts) > 0 )
                <div class="font-semibold text-lg font-Inter p-6 pb-0">All Posts</div>
            @endif

            @if( $posts->hasPages() )
                {{ $posts->links() }}
            @endif

            <div class="p-3 text-sm text-slate-600 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 flex-col gap-3">
            @forelse($posts as $post)
                <div class="border border-gray-300 bg-white shadow-lg rounded p-3">
                    <img class="h-60 object-cover my-2 mb-3 w-full" src="@if ( str_contains($post->image_path, "https://") )  @else {{ Storage::url( $post->image_path) }} @endif" alt="{{ $post->title }}">

                    <div class="flex gap-3 flex-col">
                        <span class="block w-full truncate overflow-hidden text-ellipsis capitalize text-black text-xl">{{ $post->title }}</span>

                        <span>
                            {{ $post->min_to_read }} Mins to read
                        </span>

                        <span>
                            Uploaded: {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                        </span>

                        <div class="flex gap-5">
                            <a href="{{ route('blog.edit', [$post->id]) }}" class="bg-blue-700 w-max text-xs transition-all hover:bg-blue-800 rounded-lg text-white font-Poppins py-3 px-4">Edit Post</a>

                            <form action="{{ route('blog.delete', [$post->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-700 w-max text-xs transition-all hover:bg-red-800 rounded-lg text-white font-Poppins py-3 px-4">Delete Post</button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div class="h-50 flex align-center items-center justify-center text-lg font-Poppins">
                    No Posts Uploaded
                </div>
                @endforelse
            </div>

            @if( $posts->hasPages() )
                {{ $posts->links() }}
            @endif
        </section>


        <section class="p-4">
            <table class="w-full border border-gray-300 rounded-lg p-2 bg-white shadow-sm">
                <caption class="text-left font-semibold font-Barlow text-lg p-2">Users Table</caption>

                <thead class="p-2">
                    <th class="p-3 py-4 text-left">Id</th>
                    <th class="p-3 py-4 text-left">Email</th>
                    <th class="p-3 py-4 text-left">Name</th>
                    <th class="p-3 py-4 text-left">Joined Date</th>
                    <th class="p-3 py-4 text-left">Delete</th>
                </thead>
                
                <tbody>
                    @foreach( $users as $user )
                        <tr class="p-2 odd:bg-slate-600 odd:text-white">
                            <td class="p-3">{{ $user->id }}</td>
                            <td class="p-3">{{ $user->email }}</td>
                            <td class="p-3">{{ $user->name }}</td>
                            <td class="p-3">{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                            <td class="p-3">
                                <form action="{{ route('users.delete', [$user->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <button class="font-semibold text-white text-sm py-2 bg-red-800 transition-all duration-200 hover:duration-200 px-5 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="p-2">
                @if( $users->hasPages() )
                    {{ $users->links() }}
                @endif
            </div>
        </section>
    </main>
@endsection