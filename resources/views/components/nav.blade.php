@include('components.head')

<body class="h-screen max-h-screen">
    <nav class="flex justify-between items-center w-screen p-2 bg-slate-300">
        <div class="flex gap-2.5 items-center">
            <h1 class="text-lg"> {{ config('app.name') }}</h1>
            <a href="{{ route('home') }}" class="nav-link">Home</a>
            <a href="#" class="nav-link">Todos</a>
            <a href="#" class="nav-link">New</a>
        </div>
        <div>
            @if (Route::has('login'))
            @auth
            <a href="{{ route('profile') }}" class="nav-link">Home</a>
            @else
            <a href="{{ route('login') }}" class="nav-link">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="nav-link">Register</a>
            @endif
            @endauth
            @endif
        </div>
    </nav>
