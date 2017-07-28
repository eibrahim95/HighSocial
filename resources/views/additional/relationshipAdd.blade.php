<div class="panel panel-default">
	<div class="panel-heading">
		<p>Relathionship</p>
	</div>
	<div class="panel-body">
		                {!! Form::open(['action' => 'AdditionalInfoController@store']) !!}
                    	   <div class='form-group'>
    					   {!! Form::select('relationship', Array('Single' => 'Single', 'Engaged' => 'Engaged', 'Compilicated'=> 'Complicated'), 
                             ['class' => 'form-control', 'placeholder' => 'CEO of Betengan LLC ?', 'required' => 'required']) !!}
    					   </div>
    					   <div class='form-group'>
    					   {!! Form::submit('save', ['class' => 'btn btn-primary  pull-right']) !!}
    					   </div>
					   {!! Form::close() !!}
	</div>
</div>