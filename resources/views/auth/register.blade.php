@include('components.nav')

<div class="flex justify-center items-center max-h-100">
    <form method='post' action="{{ route('register.store') }}" class="bg-slate-300 flex flex-col w-80 p-4">
        <input type="text" name="name" id="name">
        <input type="email" name="email" id="email">
        <input type="password" name="password" id="pass">
        <input type="password" name="password_confirmation" id="confirm_pass">

        <button type="submit">Register</button>
        @csrf
    </form>
</div>

@include('components.footer')
