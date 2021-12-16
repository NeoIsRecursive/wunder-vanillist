    @include('components.nav')
    @auth
    @include('components.user.index')
    @else
    @include('components.guest.index')
    @endauth
    @include('components.footer')
