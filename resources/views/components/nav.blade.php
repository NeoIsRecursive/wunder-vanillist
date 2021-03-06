@include('components.head')

<body class="h-screen max-h-screen">
    <nav class="flex justify-between items-center w-full p-2 bg-amber-200">
        <div class="flex gap-2.5 items-center">
            <a href="{{ route('home') }}" class="hover:underline underline-offset-8 focus:underline focus:outline-none">
                <h1 class="text-lg font-bold"> {{ config('app.name') }}</h1>
            </a>
            <a href="{{ route('todo.list') }}" class="nav-link">Todos</a>
            <a href="{{ route('todo.new') }}" class="nav-link">New</a>
            <a href="{{ route('tasks.all') }}" class="nav-link">Tasks</a>
        </div>
        <div class="font-semibold flex items-center">
            @if (Route::has('login'))
            @auth
            <a href="{{ route('profile') }}" class="flex md:gap-0.125 md:items-center">
                <img src="{{ Storage::url(auth()->user()->profile_image) }}" alt="user image" class="w-8 h-8 hover:shadow" style='image-rendering: pixelated'>
                <p class="nav-link hidden md:inline">{{ auth()->user()->name }}</p>
            </a>
            <a href=" {{ route('logout') }}" class="nav-link">Log out
            </a>
            @else
            <a href="{{ route('login') }}" class="nav-link">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="nav-link">Register</a>
            @endif
            @endauth
            @endif
        </div>
        <meta name="_token" class="token bg-green-100" content="{{ csrf_token() }}">
    </nav>
