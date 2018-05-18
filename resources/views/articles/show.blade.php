@extends('layouts.app')

@section('content')

<div class="container">
<h1>Showing : {{ $article->title }}</h1>

    <div class="jumbotron">
    <table>
		<tr>
			<td>
				<strong>Title:</strong>
			</td>
			<td>
				{{ $article->title }}
			</td>
		</tr>
		<tr>
			<td>
				<strong>Descriptions:</strong>
			</td>
			<td>
				{{ $article->descriptions }}
			</td>
		</tr>
		<tr>
			<td>
				<strong>Image:</strong>
			</td>
			<td>
				<img src="{!! url('/images/'.$article->image_file) !!}" alt="" width="200" height="200">
			</td>
		</tr>
		<tr>
			<td>
				<strong>Image Type:</strong>
			</td>
			<td>
				{{ $article->image_type }}
			</td>
		</tr>
		<tr>
			<td>
				<strong>Image Size:</strong>
			</td>
			<td>
				{{ $article->image_size }}
			</td>
		</tr>
		<tr>
			<td>
				<strong>Created Date:</strong>
			</td>
			<td>
				{{ $article->created_at }}
			</td>
		</tr>
		<tr>
			<td>
				<strong>Updated Date:</strong>
			</td>
			<td>
				{{ $article->updated_at }}
			</td>
		</tr>
    </table>

    </div>
    <a class="btn btn-small btn-success" href="{{ URL::to('articles') }}">Back</a> 
</div>
@stop