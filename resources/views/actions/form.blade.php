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
<body style="background-color: #e3f2fd">


<div class="container">
    <div class="row">
        <div class="col">
            @if($user !== null)
            <h2 style="margin: 3% 0 3% 20%; color: blue" >Жираф приветствует тебя, <span style="color: #ffd600; font-style: italic; font-size:xxx-large; line-height: 140%">{{ $user->name }}</span></h2>
            @endif
                @if(isset($ad))
                    <h2 style="font-weight: bold; color: blue; margin: 3% 0 3% 20%">Жду данные для корректировки Жирафообъявления : )</h2>
                @else
                    <h2 style="font-weight: bold; color: blue; margin: 3% 0 3% 20%">Жду данные для нового Жирафообъявления : )</h2>
                @endif
            <form method="post">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" @if (isset($ad)) value="{{old('title', $ad->title ?? '')}}" @endif>
                    @if($errors->has('title'))
                        @foreach($errors->get('title') as $error)
                            <p style="color: red">{{$error}}</p>
                        @endforeach
                    @endif
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description">@if (isset($ad)) {{old('description', $ad->description ?? '')}} @endif</textarea>
                    @if($errors->has('description'))
                        @foreach($errors->get('description') as $error)
                            <p style="color: red">{{$error}}</p>
                        @endforeach
                    @endif
                </div>
                <div>
                    @isset($ad)
                    <input type="hidden" name="id" value="{{$ad->id}}">
                    @endisset
                    @isset($ad)
                    <input type="hidden" name="id" value="{{$user->id}}">
                    @endisset
                </div>
                <div>
                    @if(isset($ad) && $ad->user_id == $user->id)
                        <input type="submit" class="btn btn-success" value=Save style="margin-top: 20px">
                    @elseif(isset($ad) && $ad->user_id !== $user->id)
                        <a href="/warning/" class="btn btn-success" style="margin-top: 20px">Нажми-ка сюда</a>
                    @else
                        <input type="submit" class="btn btn-success" value=Create style="margin-top: 20px">
                    @endif
                    <a href="/" class="btn btn-danger" style="margin-top: 20px">Back</a>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
