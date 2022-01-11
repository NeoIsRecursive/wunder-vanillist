<form action="{{ route('changeAvatar') }}" method="post" enctype="multipart/form-data">
    <h3>change profile picture</h3>
    <input type="file" name="avatar">
    <button>upload</button>
    @csrf
</form>
