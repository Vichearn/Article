@extends('layouts.app')

@section('content')

<div class="container">

<h1>Edit : {{ $article->title }}</h1>

{{ HTML::ul($errors->all()) }}

{{ Form::model($article, array('route' => array('articles.update', $article->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('text', 'Text') }}
        {{ Form::textarea('text', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the Article!', array('class' => 'btn btn-primary')) }}
    <a class="btn btn-small btn-success" href="{{ URL::to('articles') }}">Back</a>

{{ Form::close() }}
</div>

@stop