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
                <a href="{{ url('ads')}}" class="btn btn-primary">Back</a>{{--на индекс--}}
                {{--<a href="{{ url('/')}}" class="btn btn-primary">Back</a>--}}
            </div>
            @if($ads->user_id == $user->id)
                {!! Form::open(['method' => 'DELETE', 'route'=>['ads.destroy', $ads->id]]) !!}

                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endif
        </div>
    </form>

@stop