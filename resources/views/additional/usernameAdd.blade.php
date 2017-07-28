<div class="panel panel-default">
	<div class="panel-heading">
		<p>Choose a username</p>
	</div>
	<div class="panel-body">
		                {!! Form::open(['action' => 'AdditionalInfoController@store']) !!}
                    	   <div class='form-group'>
    					   {!! Form::text('username', '', 
                             ['class' => 'form-control', 'placeholder' => '@funnyjoe', 'required' => 'required']) !!}
    					   </div>
    					   <div class='form-group'>
    					   {!! Form::submit('save', ['class' => 'btn btn-primary  pull-right']) !!}
    					   </div>
					   {!! Form::close() !!}
	</div>
</div>