@include('components.nav')
@auth
<main>
    <div class="w-full all-tasks bg-amber-100 p-2"></div>
</main>
<script type="text/javascript" src="{{ URL::asset('js/tasks/createTask.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/tasks/getAll.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/tasks/update.js') }}"></script>
@else
@include('components.guest.index')
@endauth
@include('components.footer')
