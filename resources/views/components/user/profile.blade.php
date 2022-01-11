@include('components.nav')

<main class="grid grid-cols-2">
    <div>
        <h2 class="text-center">Welcome to your profile, {{ auth()->user()->name }}</h2>
        <p>your avatar</p>
        <img src="{{ Storage::url(auth()->user()->profile_image) }}" alt="user image" width="100" height="100" style='image-rendering: pixelated'>
    </div>
    <div>
        @include('components.user.profile.image')
    </div>
</main>

@include('components.footer')
