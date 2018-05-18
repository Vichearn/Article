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
        {{ Form::label('descriptions', 'Descriptions') }}
        {{ Form::textarea('descriptions', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('image_file', 'Image: ') }}<br />
        <img src="{!! url('/images/'.$article->image_file) !!}" alt="" width="200" height="200"><br /><br />
        {{ Form::file('image_file', Input::old('image_file'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the Article!', array('class' => 'btn btn-primary')) }}
    <a class="btn btn-small btn-success" href="{{ URL::to('articles') }}">Back</a>

{{ Form::close() }}
</div>

@stop