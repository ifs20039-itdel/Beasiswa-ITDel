@vite('resources/css/app.css')
<script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
<nav class="@yield('background') @yield(" background-opc") px-10 py-1 z-20 sticky top-0" style="width:100%">
    @guest
    @include('components.logIn')
    @else
    @include('components.loggedInAdmin')
    @endguest
</nav>