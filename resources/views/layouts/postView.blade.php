<div class="panel-body">
<p class="lead" style='margin:0;'>
<a href="#">{!! App\User::where('id', $post['user_id'])->get()[0]->name !!}</a></p>
<p><a href="#" ><span class="glyphicon"></span>{!! $post['published_at']!!}</a></p>
<p class="lead"> {!! $post['body'] !!} </p>
</div>
<hr>