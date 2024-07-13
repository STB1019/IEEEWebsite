{{-- Master Layout --}}
<!DOCTYPE html>
<html lang="en">

<head>
    @yield('head') <!-- Body -->
</head>

<body>
    {{-- @include('components/spinner') --}}
    @yield('body') <!-- Body -->
    @yield('footer') <!-- Body -->
</body>

</html>
