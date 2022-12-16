@extends('layouts.app')


@section('title', 'Users Dashboard')

@section('contents')
    <main>
        @include('layouts.header')

        <a href="{{ route('user.create') }}" class="text-white font-semibold text-sm rounded bg-purple-600 hover:bg-purple-700 transition-all duration-200 hover:duration-200">Add New User</a>
        @if( isset($users) )
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
                        @forelse( $users as $user )
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
                        @empty  
                        @endforelse
                    </tbody>
                </table>

                <div class="p-2">
                    @if( $users->hasPages() )
                        {{ $users->links() }}
                    @endif
                </div>
            </section>
        @endif
    </main>
@endsection