@include('components.nav')

<main class="flex flex-col items-center">
    <div class="flex justify-center items-center flex-col">
        <h2 class="text-center">Welcome to your profile, {{ auth()->user()->name }}</h2>
        <p>your avatar</p>
        <img src="{{ Storage::url(auth()->user()->profile_image) }}" alt="user image" width="100" height="100" style='image-rendering: pixelated'>
    </div>
    <div class="grid grid-cols-1 w-full md:w-1/2">
        <h2 class="text-xl ml-4">Edit profile:</h2>
        @if ($errors->any())
        <div class="p-2 bg-red-600">
            <h2 class="text-lg">ERRORS</h2>
            @foreach($errors->all() as $error)
            <p>
                {{ $error }}
            </p>
            @endforeach
        </div>
        @endif
        @include('components.user.profile.image')
        <div class="grid grid-cols-2">
            @include('components.user.profile.password')
            @include('components.user.profile.email')
        </div>
        @include('components.user.profile.delete')
    </div>
</main>

@include('components.footer')
