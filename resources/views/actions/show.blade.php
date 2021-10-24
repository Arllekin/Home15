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
    @include('auth')
    <div class="container" style="position: absolute; margin: 2% 0 0 3%">
        <div>
            <p><h1 style="font-weight: bold; color: blue; margin-left: 30%; font-style: italic "> Избранное Жирафообъявление : )</h1></p>
            <p><a href="/" class="btn btn-danger" style="margin-top: 20px">Back</a></p>
            <table class="table" style="margin: 50px 0 0 0">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Author Name</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                    @if($user !== null)
                        <th scope="col">Actions</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{$ad->id}}</th>
                        <td>{{$ad->title}}</td>
                        <td>{{$ad->description}}</td>
                        <td>{{$ad->user->name}}</td>
                        <td>{{$ad->created_at->diffForHumans()}}</td>
                        <td>{{$ad->updated_at}}</td>
                        @if($user !== null & \Illuminate\Support\Facades\Auth::id() == $ad->user_id)
                            <td>
                                <a href="actions/form/{{$ad->id}}" class="btn btn-success">Edit</a>
                                <a href="{{route('delete', $ad->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        @endif
                    </tr>
            </table>
        </div>
    </div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
