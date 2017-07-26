@extends('layouts.app')
@section('head')
<style>
#cover {
	height:280px; 
	background:black
}
.cover {
	width:100%;
	height: 100%
}
.profile {
	width:150px;
	height:150px;
	position: absolute;
	top:180px;
	left: 50px;
	background:black;
	border:2px solid white;
	z-index:1;
}
.profile img {
	width:146px;
	height:146px;
}
.overlay {
  position: absolute;
  height: 100%;
  width: 100%;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  opacity: 0;
  transition: .5s ease;
  background-color: rgba(20, 20, 20, 0.4);
}
.profile:hover .overlay-profile {
  opacity: 1;
}

.cover:hover .overlay-cover {
  opacity: 1;
}
.overlay .btn {
  color: white;
  position: absolute;
  width:100%;
  background: rgba(20, 20, 20, 0.7);
  text-align: center;
  font-weight: bold;

}
.overlay-profile .btn {
	bottom: 0;
	height:35px;
}
.overlay-cover .btn {
	top : 0;
	height: 25%;
}
#frame {
    position: fixed; /* Sit on top of the page content */
    display: none; /* Hidden by default */
    width: 70%; /* Full width (cover the whole page) */
    height: 70%; /* Full height (cover the whole page) */
    top: 15%;
    left:15%;
    right: 15%;
    bottom: 15%;
    background-color: rgba(200,200,200,0.95); /* Black background with opacity */
    z-index: 2; /* Specify a stack order in case you're using a different order for other elements */
}
</style>
@endsection
@section('content')
 <div id="frame">
 	<button onclick="off()" class='btn btn-link'>Close</button>
 </div> 
<div class="container">
	<div class="row">
		<div id="cover" class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
		<div class="cover">
		<div class="overlay overlay-cover">
    		<button onclick="on()" class='btn btn-link'>Update Cover Pic</button>
  		</div>
  		</div>
		<div class='profile'>
		<img src="/images/default.jpeg">
		<div class="overlay overlay-profile">
    		<button onclick="on()" class='btn btn-link'>Update Profile Pic</button>
  		</div>
  		</div>
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
 <script>
 function on() {
    document.getElementById("frame").style.display = "block";
}

function off() {
    document.getElementById("frame").style.display = "none";
}
</script>
@endsection