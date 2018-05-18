@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1>Welcome To My Site</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                <hr />
                <div class="card-body">
                    <a href="{{ URL::route('articles.index') }}" class="btn btn-danger">บทความ</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection