@extends('layouts.app')


@section('title', 'Admin Dashboard')

@section('contents')
    <main>
        <section class="header">
            <div class="w-full border-b border-gray-500 flex justify-between items-center p-3">
                <a href="">
                    <b class="font-semibold font-Poppins uppercase">laravelapp</b>
                </a>

                <nav>
                    <ul class="flex gap-6">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('blog.index') }}">Blogs</a></li>
                        <li><a href="{{ route('admin.users') }}">Users</a></li>

                        @auth
                            <li class="group relative hover:cursor-pointer">
                                <div class="flex justify-between items-center">
                                    <span>{{ auth()->user()->name }}</span>

                                    <svg class="w-4 h-4 ml-1 group-hover:rotate-180 transition-all duration-300 group-hover:duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                </div>

                                <div class="group-hover:block hidden absolute top-6 px-2 py-2 rounded border shadow-lg border-gray-400 bg-white right-1 overflow-y-auto overflow-x-hidden transition-all duration-200 hover:duration-200 text-sm">
                                    {{-- Settings --}}
                                    <a href="/admin/settings" class="py-2 pr-4 flex items-center gap-2 hover:text-blue-700 transition-all duration-200 hover:duration-200 border-b bordr-gray-200 peer">
                                        <svg class="w-4 h-4  transition-all duration-200 group-hover:duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        <span >Settings</span>
                                    </a>

                                    {{-- Logout --}}
                                    <form action="{{ route('logout') }}" method="POST" class="border-b py-2 pr-4 border-gray-200">
                                        <button class="focus:outline-none outline-none flex items-center gap-2"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg><span>Logout</span></button>

                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endauth
                        <li><a href="">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
        </section>


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


        <section>
            <table>
                <caption>Users Table</caption>
                <thead>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Joined Date</th>
                    <th>Delete</th>
                </thead>

                <tbody>
                    @foreach( $users as $user )
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                            <td>
                                <form action="" method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <button class="font-semibold text-white text-sm py-2 bg-red-800 transition-all duration-200 hover:duration-200 px-5 rounded"></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
@endsection