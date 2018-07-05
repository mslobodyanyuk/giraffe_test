@extends('layout.template')
@section('content')
    <h1>Edit Ad</h1>
    {!! Form::model($ad,['method' => 'PATCH','route'=>['ads.update',$ad->id]]) !!}
    <div class="form-group">
        {!! Form::label('Title', 'Title:') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::text('description',null,['class'=>'form-control']) !!}
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
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop