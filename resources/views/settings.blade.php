@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-4 ">
            <div class="panel panel-default">
                    <img width="200" heigh="200" src="{{ App\AdditionalInfo::where('user_id', Auth::user()->id)->first()->profile_pic }}">
            
            	<div class="panel-heading">{{ Auth::user()->name }}</div>
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="{{ $active['gn'] }}"><a data-toggle="tab" href="#gn">General Infromation</a></li>
                        <li class="{{ $active['fb'] }}"><a data-toggle="tab" href="#fb">Facebook Connection</a></li>
                        <li class="{{ $active['tw'] }}"><a data-toggle="tab" href="#tw">Twitter Connection</a></li>
                        <li class="{{ $active['in'] }}"><a data-toggle="tab" href="#in">Instagram Connection</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div id="gn" class="col-md-8 panel tab-pane fade in {{ $active['gn'] }}">
                	<div class="panel-body">
                		<table class="table">
                			<thead>
                				<tr>
                    				<th><p>Name : </p></th>
                    				<th><p>{{ Auth::user()->name }}</p></th>
                    			</tr>
                			</thead>
                			<tbody>
                    			<tr>
                    				<td><p>Email : </p></td>
                    				<td>{{ Auth::user()->email }}</td>
                    			</tr>
                    			<tr>
                    				<td><p>Joined : </p></td>
                    				<td>{{ Auth::user()->created_at }}</td>
                    			</tr>
                    		</tbody>
                  		</table>
                  	</div>
                </div>
             
                <div id="fb" class="col-md-8 panel tab-pane fade in {{ $active['fb'] }}">
                	<div class="panel-body">
                		@if (Auth::user()->facebook_id == NULL)
                			<meta name="_token" content="{{ csrf_token() }}">
                			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                			<p>Not Connected to Facebook<span id="btn-login" class="pull-right"><button class="btn btn-primary" >Connect Now</button></span></p>

                			@if (App::environment() != 'local')
        						<script src="{{ secure_asset('js/facebook_connect.js') }}"></script>
    						@else
        						<script src="{{ asset('js/facebook_connect.js') }}"></script>
    						@endif
                		@else
                			<p>Connected to Facebook<a target="_blank" href="/facebook/disconnect"><span id="btn-login" class="pull-right"><button class="btn btn-primary" >Disconnect</button></span></a></p>
                		@endif
                	</div>
                </div>
                <div id="tw" class="col-md-8 panel tab-pane fade in {{ $active['tw'] }}">
                	<div class="panel-body">
                	@if (Auth::user()->twitter_id == NULL)
                			<p>Not Connected to Twitter<a target="_blank" href="/twitter/connect"><span class="pull-right"><button class="btn btn-primary" >Connect Now</button></span></a></p>

                		@else
                			<p>Connected to Twitter<a target="_blank" href="/twitter/disconnect"><span id="btn-login" class="pull-right"><button class="btn btn-primary" >Disconnect</button></span></a></p>
                		@endif
                	</div>
                </div>

                <div id="in" class="col-md-8 panel tab-pane fade in {{ $active['in'] }}">
                	<div class="panel-body">
                		@if (Auth::user()->instagram_id == NULL)				   
                			<p>Not Connected to Instagram<a target="_blank" href="/instagram/connect"><span class="pull-right"><button class="btn btn-primary" >Connect Now</button></span></a></p>

                		@else
                			<p>Connected to Instagram<span id="btn-login" class="pull-right"><button class="btn btn-primary" >Disconnect</button></span></p>
                		@endif
                	</div>
                </div>
        </div>
	</div>
</div>
@endsection