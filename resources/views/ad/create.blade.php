@extends('layout.template')
@section('content')
    <h1>Create Ad</h1>
    {!! Form::open(['url' => 'ads']) !!}
    {{csrf_field()}}
    <div class="form-group">
        {!! Form::label('Title', 'Title:') !!}
        {!! Form::text('title',null,['class'=>'form-control', 'placeholder'=>'Title', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::text('description',null,['class'=>'form-control', 'placeholder'=>'Description', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('text', 'Text:') !!}
        {!! Form::textarea('text',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('image', 'Image:')!!}
        {!! Form::file('image',['class' => 'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create', ['class' => 'btn btn-primary ']) !!}
    </div>
    {!! Form::close() !!}
@stop