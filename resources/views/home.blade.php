@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-4">
            <div class="panel panel-default">
                @if (App::environment() != 'local')
                    <img width="200" heigh="200" src="{{ secure_asset('images/default.jpeg') }}">
                @else
                    <img width="200" heigh="200" style="margin:0 auto" src="{{ asset('images/default.jpeg') }}">
                @endif
            
                <div class="panel-heading">{{ Auth::user()->name }}</div>
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a  href="#gn">General Feed</a></li>
                        <li><a href="#fb">Facebook Feed</a></li>
                        <li><a href="#tw">Twitter Feed</a></li>
                        <li><a href="#in">Instagram Feed</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-8">
            @include('layouts.postForm')
            <div class="panel panel-default">
                <div class="panel-heading">Feed</div>
                    @foreach ($user_posts as $post)
                        @include('layouts.postView')
                    @endforeach
                    @foreach ($fb_posts as $post)
                        @include('layouts.postView')
                    @endforeach
                    @if (count($user_posts) == 0 and count($fb_posts) ==0)
                        <div class="panel-body">
                            <br>
                            <p class="lead"> Nothing to view yet ! </p>
                            <br>
                        </div>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection
