@include('components.head')

<body class="h-screen max-h-screen">
    <nav class="flex justify-between items-center w-screen p-2 bg-amber-200">
        <div class="flex gap-2.5 items-center">
            <a href="{{ route('home') }}" class="hover:underline underline-offset-8 focus:underline focus:outline-none">
                <h1 class="text-lg font-bold"> {{ config('app.name') }}</h1>
            </a>
            <a href="{{ route('todo.list') }}" class="nav-link">Todos</a>
            <a href="{{ route('todo.new') }}" class="nav-link">New</a>
        </div>
        <div class="font-semibold">
            @if (Route::has('login'))
            @auth
            <a href="{{ route('profile') }}" class="nav-link">{{ auth()->user()->name }}</a>
            <a href="{{ route('logout') }}" class="nav-link">Log out</a>
            @else
            <a href="{{ route('login') }}" class="nav-link">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="nav-link">Register</a>
            @endif
            @endauth
            @endif
        </div>
    </nav>
