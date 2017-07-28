<div class="panel panel-default">
	@if ($user_additional->intro_text != NULL or $user_additional->username != NULL)
		<div class="panel-heading">
			@if ( $user_additional->intro_text != NULL)
				<p> {!! $user_additional->intro_text !!}</p>
			@endif
			@if ( $user_additional->username != NULL)
				<p> @ {!! $user_additional->username !!}</p>
			@endif
		</div>
	@endif
		<div class="panel-body">
			@if($user_additional->birthday != NULL)
        		<p>Born On : {!! $user_additional->birthday !!}</p>
        	@endif
        	@if ($user_additional->born_at != NULL)
        		<p>Born At : {!! $user_additional->born_at !!}</p>
        	@endif
        	@if ($user_additional->lives_at != NULL)
        		<p>Lives At: {!! $user_additional->lives_at !!}</p>
        	@endif
        	@if ($user_additional->relationship != NULL)
        		<p>Relationship : {!! $user_additional->relationship !!}</p>
        	@endif
	</div>
</div>