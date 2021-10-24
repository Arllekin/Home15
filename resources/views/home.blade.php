@extends('layout')

@section('title', 'Главная страница')

@section('body')

    @if($user !== null)
    <div style="margin: 55% 0 0 0; position: absolute">
        <a href="actions/form" class="btn btn-primary" style="font-size: larger; font-weight: bold">Create Ad</a>
    </div>
    @endif
    <div style="margin: 80% 0 0 0">
        <p><h1 id ="advts" style="font-weight: bold; color: blue; margin-left: 30%; font-style: italic "> Доска Жирафообъявлений : )!</h1></p>
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
            @foreach($advts as $advt)
                <tr>
                    <th scope="row">{{$advt->id}}</th>
                    <td><a href="{{route('actions.show', $advt->id)}}">{{$advt->title}}</a> </td>
                    <td>{{$advt->description}}</td>
                    <td>{{$advt->user->name}}</td>
                    <td>{{$advt->created_at->diffForHumans()}}</td>
                    <td>{{$advt->updated_at}}</td>
                    @if($user !== null & \Illuminate\Support\Facades\Auth::id() == $advt->user_id)
                        <td>
                            <a href="actions/form/{{$advt->id}}" class="btn btn-success">Edit</a>
                            <a href="{{route('delete', $advt->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </table>
        <div>{{$advts->links()}}</div>
    </div>

@endsection
