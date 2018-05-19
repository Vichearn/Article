@extends('layouts.app')

@section('title')
<link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <h1>Articles List</h1>

            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif

                <table class="table table-striped table-bordered">
                    <thead align="center">
                        <tr>
                            <td>Title</td>
                            <td>Description</td>
                            <td>Image</td>
                            <td>Image Type</td>
                            <td>Image Size</td>
                            <td>Created Date</td>
                            <td>Updated Date</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $key => $value)
                        <tr>
                            <td> {{ $value->title }}</td>
                            <td> {{ $value->descriptions }}</td>
                            <td>
                                <img src="{!! url('/images/'.$value->image_file) !!}" alt="" width="100" height="100">
                            </td>
                            <td> {{ $value->image_type }}</td>
                            <td> {{ $value->image_size }}</td>
                            <td> {{ $value->created_at }}</td>
                            <td> {{ $value->updated_at }}</td>
                            <td>
                                <a class="btn btn-small btn-success btn-sm" href="{{ URL::to('articles/' . $value->id) }}">Show</a>  
                                <a class="btn btn-small btn-info btn-sm" href="{{ URL::to('articles/' . $value->id . '/edit') }}">Edit</a>
                                
                                {{ Form::open(['id'=>'deleteForm','method'=>'DELETE','url'=>'/articles/' . $value->id]) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            <button type="button" class="btn btn-dark">
                <a href="{{ URL::route('articles.create') }}">เพิ่มบทความ</a>
            </button>
            <a class="btn btn-small btn-success" href="{{ URL::to('articles') }}">Refesh</a>
        </div>
    </div>
</div>
@endsection