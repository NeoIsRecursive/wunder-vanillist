@include('components.nav')

<main class="grid grid-cols-2">
    <div>
        <h2 class="text-center">Welcome to your profile, {{ auth()->user()->name }}</h2>
        <p>your avatar</p>
        <img src="{{ auth()->user()->profile_image }}" alt="user image" width="100" height="100" style='image-rendering: pixelated'>
    </div>
    <div>
        <form action="" method="post">
            <h3>change profile picture</h3>
            <input type="file">
        </form>
    </div>
</main>

@include('components.footer')
