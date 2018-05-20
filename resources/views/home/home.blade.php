@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1>Welcome To My Site</h1></div>
                <div class="card-body">
                    <a href="{{ URL::route('articles.index') }}" class="btn btn-danger">บทความ</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection