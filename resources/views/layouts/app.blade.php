<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Laravel Blog')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


</head>
<body class="bg-slate-200 p-4 font-Inter">
    @yield('contents')

    {{-- Flash success message --}}
    @if(session()->has('success'))
        <div class="text-red text-sm p-4 border-2 border-green-900 fixed max-w-md z-50 right-1 bottom-1 bg-green-200 text-green-700"> 
            {{ session('success') }}
        </div>
    @endif
    

    {{-- Flash Error Message --}}
    @if(session()->has('error'))
        <div class="text-red text-sm p-4 fixed border-2 border-green-900 max-w-md z-50 right-1 bottom-1 bg-red-200 text-red-700"> 
            {{ session('error') }}
        </div>
    @endif
</body>
</html>