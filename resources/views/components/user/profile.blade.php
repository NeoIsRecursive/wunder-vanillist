@include('components.nav')

<main class="flex flex-col">
    <div class="flex justify-center items-center flex-col">
        <h2 class="text-center">Welcome to your profile, {{ auth()->user()->name }}</h2>
        <p>your avatar</p>
        <img src="{{ Storage::url(auth()->user()->profile_image) }}" alt="user image" width="100" height="100" style='image-rendering: pixelated'>
    </div>
    <div class="flex justify-center items-center flex-col">
        <h2>edit profile</h2>
        @if ($errors->any())
        @foreach($errors->all() as $error)
        <p>
            {{ $error }}
        </p>
        @endforeach
        @endif
        @include('components.user.profile.image')
        <div class="grid grid-cols-2">
            @include('components.user.profile.password')
            @include('components.user.profile.email')
        </div>
    </div>
</main>

@include('components.footer')
