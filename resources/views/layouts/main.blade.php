<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-head />

<body class="font-sans antialiased">
    {{ $slot }}

    @stack('modals')

    @livewireScripts
</body>

</html>
