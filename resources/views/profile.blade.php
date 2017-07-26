@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2" style="height:280px; background:black">
		<img src="/images/default.jpeg" style="width:150px;height:150px; position: absolute; top:180px; left: 50px; background:black; border:2px solid white;z-index:1000">
		<div style="width:150px; position: absolute; top:220px; left: 230px; background:transparent ;color:white; font-size: 18px; font-weight:bold;">
		<p> {!! Auth::user()->name !!}</p>
		</div>
	</div>
	</div>
	<div class="row" style="margin-top: 55px">
        <div class="col-md-2 col-sm-2 col-md-offset-2">
            <div class="panel panel-default">
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