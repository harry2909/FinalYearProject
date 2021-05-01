<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.14.0/js/all.js" data-auto-replace-svg="nest"></script>
    <title>Final year Project @yield(('title'))</title>
</head>
<body class="bg-gray-200">
<div class="max-w-full rounded overflow-hidden flex flex-wrap text-black-500 justify-center">
    @yield('allStudents')
</div>
<div class="max-w-full rounded overflow-hidden flex flex-wrap text-black-500 justify-center">
    @yield('viewStudent')
</div>
<div class="max-w-full rounded overflow-hidden flex justify-center text-white">
    @yield('paginator')
</div>
</body>
</html>

