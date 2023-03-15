<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{asset('js/alpine.min.js')}}"></script>
</head>

<body>
    @include('layouts.nav-bar')
    <main>
        @yield('content')
    </main>
    <style>
        body {
            font-family: 'PT Sans Narrow', sans-serif;
        }
    </style>
</body>

</html>
