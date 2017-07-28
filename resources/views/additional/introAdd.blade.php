<div class="panel panel-default">
	<div class="panel-heading">
		<p>Yourself in a few words</p>
	</div>
	<div class="panel-body">
		                {!! Form::open(['action' => 'AdditionalInfoController@store']) !!}
                    	   <div class='form-group'>
    					   {!! Form::text('intro_text', '', 
                             ['class' => 'form-control', 'placeholder' => 'CEO of Betengan LLC ?', 'required' => 'required']) !!}
    					   </div>
    					   <div class='form-group'>
    					   {!! Form::submit('save', ['class' => 'btn btn-primary  pull-right']) !!}
    					   </div>
					   {!! Form::close() !!}
	</div>
</div>