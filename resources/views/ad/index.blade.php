<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Giraffe Software</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>
<body class="text-center">

@if(Auth::check())
    <h2>Welcome, {{Auth::user()->username}}</h2>
    <br/>
    <div class="container">
        <div class="form-group">
            <a href="{{ route('logout')}}" class="btn btn-success">Logout</a>
            <hr>
        </div>
    </div>

@else
    <form action="/register" class="form-signin" method="post">
        {{csrf_field()}}
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputUserName" class="sr-only">User name</label>
        <input type="username" id="inputUserName" name="username" class="form-control" align="center"  placeholder="User name" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
    </form>
</body>
</html>
@endif

@extends('layout.template')
@section('content')

    @if(Auth::check())
        <div class="container">
            <div class="form-group">
                <h1>List Ads:</h1>
                <a href="{{url('/ads/create')}}" class="btn btn-success">Create Ad</a>
                <hr>
            </div>
        </div>
    @endif

    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Author</th>
            <th>Created at</th>
            <th colspan="2">Actions</th>
        </tr>
        </thead>

        <tbody>
        @foreach($ads as $item)
            <tr>
                <td>
                    <img src="/uploads/ad/small/{{ $item->image }}" />
                </td>
                <td>
                    <a href="/ad/{{$item->id}}"><h4>{{ $item->title }}</h4></a>
                </td>
                <td>
                    {!! $item->description !!}
                </td>
                <td>
                    {!! $item->authorName !!}
                </td>
                <td>
                    {{ $item->created_at->format('d.m.Y H:i') }}
                </td>

                @if(Auth::check())
                    <td><a href="{{route('ads.edit',$item->id)}}" class="btn btn-warning">Edit</a></td>
                @endif

                {{--@if($item->user_id == $user->id)--}}
                @if(Auth::id() == $item->user_id)

                        <td>
                   {{-- @can('delete', $ad)--}}
                        {!! Form::open(['method' => 'DELETE', 'route'=>['ads.destroy', $item->id]]) !!}
                        {{ csrf_field() }}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    {{--@endcan--}}
                @endif
                        </td>

            </tr>
        @endforeach
        </tbody>
    </table>

    @include('partials.paginate', ['pager' => $ads])

@stop