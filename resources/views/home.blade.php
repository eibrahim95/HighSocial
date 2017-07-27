@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-3">
            <div class="panel panel-default">
                    <img width="200" height="200" src="{{ $user_additional->profile_pic }}">
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
        <div class="col-md-6 col-sm-6">
                    @include('layouts.postForm')
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
@endsection
