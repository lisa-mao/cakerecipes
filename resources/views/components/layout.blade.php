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

<body class=", text-black" style="background-color: #F5EFE6">

{{$slot}}
</body>
</html>
