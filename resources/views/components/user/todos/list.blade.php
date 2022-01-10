@foreach($todos as $todo)
@include('components.user.todos.todo')
@endforeach
<script type="text/javascript" src="{{ URL::asset('js/tasks/createTask.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/tasks/new.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/tasks/update.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/tasks/fetch.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/remove.js') }}"></script>
