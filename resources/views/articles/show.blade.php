@extends('layouts.app')

@section('content')

<div class="container">
<h1>Showing : {{ $article->title }}</h1>

    <div class="jumbotron">
        <h2>{{ $article->title }}</h2>
        <p>
            <strong>Text:</strong> {{ $article->text }}
        </p>
    </div>
    <a class="btn btn-small btn-success" href="{{ URL::to('articles') }}">Back</a> 
</div>
@stop