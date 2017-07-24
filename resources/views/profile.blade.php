@extends('layouts.app')
@section('content')
	<div class="row">
        <div class="col-md-3 col-md-offset-1">
            <div class="panel panel-default">
            	<div class="panel-heading">{{ Auth::user()->name }}</div>
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a data-toggle="tab" href="#gn">General Infromation</a></li>
                        <li><a data-toggle="tab" href="#fb">Facebook Connection</a></li>
                        <li><a data-toggle="tab" href="#fb">Twitter Connection</a></li>
                        <li><a data-toggle="tab" href="#fb">Instagram Connection</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div id="gn" class="col-md-5 panel tab-pane fade in active">
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
             
                <div id="fb" class="col-md-5 panel tab-pane fade in">
                	<div class="panel-body">
                		@if (Auth::user()->facebook_id == NULL)
                			<p>Not Connected to Facebook<span class="pull-right"><a href="#">Connect Now</a></span></p>
                		@else
                			<p>Connected to Facebook</p>
                		@endif
                	</div>
                </div>
        </div>
	</div>

@endsection