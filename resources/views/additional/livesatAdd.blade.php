<div class="panel panel-default">
	<div class="panel-heading">
		<p>Where do you live now ?</p>
	</div>
	<div class="panel-body">
		                {!! Form::open(['action' => 'AdditionalInfoController@store']) !!}
                    	   <div class='form-group'>
    					   {!! Form::text('lives_at', '', 
                             ['class' => 'form-control', 'placeholder' => 'London, UK', 'required' => 'required']) !!}
    					   </div>
    					   <div class='form-group'>
    					   {!! Form::submit('save', ['class' => 'btn btn-primary  pull-right']) !!}
    					   </div>
					   {!! Form::close() !!}
	</div>
</div>