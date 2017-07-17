
<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Tweet</div>

                <div class="panel-body">
                    {!! Form::open(['action' => 'TweetController@publishTweet']) !!}
                    	<div class='form-group'>
    					{!! Form::textarea('body', 'What\'s on your mind ?', ['rows'=> '3', 'class' => 'form-control']) !!}
    					</div>
    					<div class='form-group'>
    					{!! Form::submit('submit', ['class' => 'btn btn-primary  pull-right']) !!}
    					</div>
					{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
