<div class="panel panel-default">
	<div class="panel-heading">
		<p>Place of Birth</p>
	</div>
	<div class="panel-body">
		                {!! Form::open(['action' => 'AdditionalInfoController@store']) !!}
                    	   <div class='form-group'>
    					   {!! Form::text('born_at', '', 
                             ['class' => 'form-control', 'placeholder' => 'Washinton DC, USA', 'required' => 'required']) !!}
    					   </div>
    					   <div class='form-group'>
    					   {!! Form::submit('save', ['class' => 'btn btn-primary  pull-right']) !!}
    					   </div>
					   {!! Form::close() !!}
	</div>
</div>