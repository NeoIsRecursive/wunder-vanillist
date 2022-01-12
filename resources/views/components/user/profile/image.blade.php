<form action="{{ route('changeAvatar') }}" method="post" enctype="multipart/form-data" class="flex justify-center items-center flex-col bg-amber-100 p-4">
    <h3 class="text-lg font-bold">change profile picture</h3>
    <p>we only support jpg and png images up to 2megabytes</p>
    <input type="file" name="avatar">
    <button>upload</button>
    @csrf
</form>
