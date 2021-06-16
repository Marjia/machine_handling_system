<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Machine Handling System</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body>
    @include('template.nav')
    <!-- @include('template.sidenav') -->
    @yield('content')

    <script src="{{ asset('js/materialize.min.js') }}"></script>
    @yield('customJs')
</body>
</html>
