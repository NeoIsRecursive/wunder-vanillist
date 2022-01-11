<form action="{{ route('changeAvatar') }}" method="post" enctype="multipart/form-data" class="flex justify-center items-center flex-col bg-amber-100 p-4">
    <h3>change profile picture</h3>
    <input type="file" name="avatar">
    <button>upload</button>
    @csrf
</form>
