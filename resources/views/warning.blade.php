<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
<div>
    <img style="width: 100%; position: absolute" src="https://images.freeimages.com/images/large-previews/684/giraffe-1247173.jpg" alt="Жираф прилёг отдохнуть">
</div>
<div style="color: red; margin: 20px 75% 0 20px; position: absolute">
    <h2 >Уважаемый, <span style="color: rebeccapurple; font-style: italic; font-size:xxx-large; line-height: 140%">{{ $user->name }}</span>!<br>Жираф сообщает вам, что трогать чужие объявления - неприлично!</h2>
</div>
<div>
    <a href="/" style="color: red; margin: 20px 20px 0 77%; font-size: x-large; position: absolute">Возвращайтесь на главную страницу! И пусть вам будет стыдно!</a>
</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
