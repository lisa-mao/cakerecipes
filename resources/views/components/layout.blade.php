<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <script src="{{asset("js/checkbox.js")}}" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Home</title>
</head>
@include('layouts.navigation')

<body class="min-h-screen flex flex-col text-black" style="background-color: #F5EFE6">

<main class="flex-grow">
    {{$slot}}
</main>

<footer class="w-full bg-[#6D94C5] text-white p-4 text-center">footer</footer>

</body>
</html>
