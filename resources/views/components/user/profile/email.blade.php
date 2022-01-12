<form method="POST" action="{{ route('changeEmail') }}" class="bg-blue-400 p-4">
    <div class="input">
        <label for="oldemail">Current email:</label>
        <input type="email" name="current_email" id="oldemail">
    </div>
    <div class="input">
        <label for="newemail">New email:</label>
        <input type="email" name="new_email" id="newemail">
    </div>
    <button class="text-center">change email</button>
    @if (Session::get('emailchange') !== null)
    <div>
        {{ Session::get('emailchange') }}
    </div>
    @endif
    @csrf
</form>
