@include('components.nav')

<main>
    <meta name="_token" class="token" content="{{ csrf_token() }}">


    @include('components.user.tasks.new')
</main>
<script>
    const url = '<?php echo route('tasks.get') ?>';
    const token = document.querySelector('.token').content;
    fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-Token': token,
            },
            body: JSON.stringify({
                'todo_id': 1,
                'csrf-token': token,
            })
        })
        .then(request => request.json())
        .then(request => console.log(request));
</script>
@include('components.footer')
