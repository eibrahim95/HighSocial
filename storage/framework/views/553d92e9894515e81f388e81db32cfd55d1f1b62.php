<div class="panel-body">
<p class="lead" style='margin:0;'>
<a href="#"><?php echo App\User::where('id', $tweet['user_id'])->get()[0]->name; ?></a></p>
<p><a href="#" ><span class="glyphicon"></span><?php echo $tweet['published_at']; ?></a></p>
<p class="lead"> <?php echo $tweet['body']; ?> </p>
</div>
<hr>