@extends('layout.template')

@section('content')
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
            @if(Auth::id() == $ads->user_id )
                <div class="col-sm-1">
                    {!! Form::open(['url' => 'delete/'.$ads->id, 'method' => 'DELETE']) !!}
                    {{ csrf_field() }}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </div>
                <div class="col-sm-1">
                    {!! Form::open(['url' =>'edit/'.$ads->id, 'method' => 'POST']) !!}
                    {!! Form::button('Edit', ['type' => 'submit', 'class' => 'btn btn-warning']) !!}
                    {{ Form::close() }}
                </div>
            @endif
       </div>
@stop