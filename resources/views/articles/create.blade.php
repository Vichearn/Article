@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Article</h2>
    <hr />
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'articles', 'files' => true, 'method' => 'post')) }}
      <div class="form-row">
        <div class="form-group col-md-6">
          {{ Form::label('title', 'Title: ', array('class' => 'h4')) }}
          {{ Form::text('title', Input::old('title'), array('class' => 'form-control', 'placeholder' => 'บทความ')) }}
        </div>

        <div class="form-group col-md-12">
          {{ Form::label('descriptions', 'Descriptions: ', array('class' => 'h4')) }}
          {{ Form::textarea('descriptions', Input::old('descriptions'), array('class' => 'form-control', 'placeholder' => 'เนื้อหา')) }}
        </div>

        <div class="form-group col-md-6">
          {{ Form::label('image_file', 'Image: ', array('class' => 'h4')) }}
          {{ Form::file('image_file', Input::old('image_file'), array('class' => 'form-control')) }}
        </div>
      </div>
      <hr />
      <button type="submit" class="btn btn-primary">Add</button>
      <a class="btn btn-small btn-success" href="{{ URL::to('articles') }}">Back</a>
{{ Form::close() }}
</div>
@endsection