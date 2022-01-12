<form method="POST" action="{{ route('changePassword') }}" class="bg-pink-400 p-4">
    <div class="input">
        <label for="oldpass">Current password:</label>
        <input type="password" name="password" id="oldpass">
    </div>
    <div class="input">
        <label for="pass">New password:</label>
        <input type="password" name="new_password" id="pass">
    </div>
    <div class="input">
        <label for="confirm_pass">Confirm new password</label>
        <input type="password" name="new_password_confirmation" id="confirm_pass">
    </div>
    <button class="text-center">change password</button>
    @if (Session::get('passchange') !== null)
    <div>
        {{ Session::get('passchange') }}
    </div>
    @endif
    @csrf
</form>
