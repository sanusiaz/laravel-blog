<section class="header">
    <div class="w-full border-b border-gray-500 flex justify-between items-center p-3">
        <a href="">
            <b class="font-semibold font-Poppins uppercase">{{ env('APP_NAME') }}</b>
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