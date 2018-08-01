@extends('layout.template')

@section('content')
    <form class="form-horizontal">
        <h1>{{ $ads->title }}</h1>
        <div class="content">
            <img src="/uploads/ad/medium/{{ $ads->image }}" style="float: left" />

            <p>{!! $ads->text !!}</p>

            <p>Description: {!! $ads->description !!}</p>

            <p>Author: {!! $ads->authorName !!}</p>

            <p>Created at: {!! $ads->created_at->format('d.m.Y H:i') !!}</p>
        </div>
        <div class="form-group">
            <div class="col-sm-1">
                <a href="{{ url('/')}}" class="btn btn-primary">Back</a>
            </div>
            {{--@if(Auth::check() && $ads->user_id == $user->id)--}}
{{--{{dd($ads)}}--}}
            @if(Auth::id() == $ads->user_id )
                {{--{!! Form::open(['method' => 'DELETE', 'route'=>['ads.destroy', $ads->id]]) !!}
                {{ csrf_field() }}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}--}}


{{--    {!! Form::open(['method' => 'post', 'route'=>['ads.destroy', $ads->id]]) !!}
            {{ csrf_field() }}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}--}}


                {{--{!! Form::open(['method' => 'get', 'route'=>['ads.destroy', $ads->id]]) !!}
                {{ csrf_field() }}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}--}}

                <div class="col-sm-1">
                    <a href="{{ url('delete/'.$ads->id)}}" class="btn btn-danger">Delete</a>
                </div>

                <div class="col-sm-1">
                    <a href="{{ url('edit/'.$ads->id)}}" class="btn btn-warning">Edit</a>
                </div>

{{--                <form action="{{ url('/ads', ['id' => $ads->id]) }}" method="post">
                    {!! method_field('delete') !!}
                    {!! csrf_field() !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                </form>--}}
            @endif
        </div>
    </form>

@stop