<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body style="background-color: #e3f2fd">

<header>
    <div style="position: absolute;">
        <img style="width: 201%;" src="https://cdn.pixabay.com/photo/2015/01/27/19/34/giraffe-614141_960_720.jpg" alt="Жираф прилёг отдохнуть">
    </div>
    <div style="position: absolute; margin: 40px 0 0 10%">
        @if($user !== null)
            <h1 style="color:#ffd600; font-style: italic">Ты зашёл к Жирафу в гости.</h1>
        @else
            <h1 style="color:#ffd600; font-style: italic">Ты стоишь у дома Жирафа.</h1>
        @endif
    </div>
    <div>

        @include('auth')

        <div>
            <a href="#advts">
                <h2 style="color:#ffd600; font-style: italic; margin: 20% 0 0 2%; position: absolute; text-decoration: underline">И у жирафа есть пара новостей для тебя.</h2>
            </a>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col">
            @yield('body')
        </div>
    </div>
</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
