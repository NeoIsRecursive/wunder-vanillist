<form action="{{ route('deleteUser') }}" method="POST" class="flex justify-center items-center flex-col bg-amber-100 p-4 mb-4">
    @csrf
    @method('DELETE')
    <h3 class="text-lg font-bold">Delete my account</h3>
    <button onclick="return confirm('Are you sure?')">delete</button>
</form>
