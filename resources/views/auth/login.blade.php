@include('components.nav')

<div class="flex justify-center items-center max-h-100">
    <form method='post' action="{{ route('login.check') }}" class="bg-slate-300 flex flex-col w-80 p-4 gap-2.5">
        <div class="input">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="input">
            <label for="pass">Password:</label>
            <input type="password" name="password" id="pass">
        </div>
        <button type="submit" class="submit">Login</button>
        @csrf
        @if ($errors->any())
        @foreach($errors->all() as $error)
        <p>
            {{ $error }}
        </p>
        @endforeach
        @endif
    </form>
</div>

@include('components.footer')
