<div class="panel-body">
<div class="row" style="margin-bottom: 10px;">
	<div class="col-md-2 col-sm-2" style="width:90px"><img height="60" src="/images/default.jpeg"></div>
	<div class="col-md-3 col-sm-5">
		<p class="lead" style='margin:0;'>
		<a href="#">{!! App\User::where('id', $post['user_id'])->get()[0]->name !!}</a></p>
		<p><a href="#" ><span class="glyphicon"></span>{!! $post['published_at']!!}</a></p>
	</div>
</div>
<p class="lead" style="color:#111111"> {!! $post['body'] !!} </p>
<div class="row">
	<button class='btn btn-link'><div class="col-md-1">HIGH</div></button>
	<span style="margin:0px 3px; color:#bbb;">|</span>
	<button class='btn btn-link'><div class="col-md-1">DOWN</div></button>
</div>
</div>
<hr style="margin:0; border-color: #bbb">
