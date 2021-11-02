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
{{--        Форма аутентификации. Начало--}}
        <div class = "container-fluid">
            @if($user == null)
                <form style="padding: 40px 20px 0 80%; position: absolute"  method="post">
                    @csrf
{{--                    Имя формы--}}
                    <h2 style="color: #ffd600">Может войдёшь?</h2>
{{--                    Поля вода--}}
                    <div class="mb-3">
                        <label for="name" class="form-label" style="color: #ffd600">Username</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{request()->old('name')}}">
                        @if($errors->has('name'))
                            @foreach($errors->get('name') as $error)
                                <p style="color: red">{{$error}}</p>
                            @endforeach
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label" style="color: #ffd600">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                        @if($errors->has('password'))
                            @foreach($errors->get('password') as $error)
                                <p style="color: red">{{$error}}</p>
                            @endforeach
                        @endif
                    </div>
                    <div>
                        <input type="submit" class="btn btn-success" value="Вход" style="margin-top: 20px">
                    </div>
                </form>
                <div style="margin: 20% 20px 0 80%; position: absolute; font-size: x-large">
                    <a style="color: #ffd600" href="{{$oauth_login_discord}}">Войти через Discord</a>
                </div>
            @else
{{--                Вывод приветствия--}}
                <div style="color: #ffd600; margin: 50px 20px 0 77%; position: absolute">
                    <h2 >Жираф приветствует тебя, <span style="color: #ffd600; font-style: italic; font-size:xxx-large; line-height: 140%">{{ $user->name }}</span></h2>
                </div>
{{--                Логаут--}}
                <div>
                    <a href="/logout/" style="color: #ffd600; margin: 20% 20px 0 77%; font-size: larger; position: absolute">Желаешь оставить Жирафа в одиночестве?</a>
                </div>
        @endif
{{--                        Форма аутентификации. Конец--}}
    </header>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
