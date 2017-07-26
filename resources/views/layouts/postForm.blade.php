
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#fb">Facebook Post</a></li>
                        <li><a data-toggle="tab" href="#tw">Twitter Tweet</a></li>
                        <li><a data-toggle="tab" href="#hi">HighSocial Post</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                <div id="fb" class="panel-body tab-pane fade in active">
                    {!! Form::open(['action' => 'FacebookPostController@store']) !!}
                    	<div class='form-group'>
    					{!! Form::textarea('body', '', 
                            ['rows'=> '3', 'class' => 'form-control', 'placeholder' => 'What\'s on your mind ?']) !!}
    					</div>
    					<div class='form-group'>
    					{!! Form::submit('submit', ['class' => 'btn btn-primary  pull-right']) !!}
    					</div>
					{!! Form::close() !!}
                </div>
                <div id="tw" class="panel-body tab-pane fade in ">
                {!! Form::open(['action' => 'TwitterTweetController@store']) !!}
                        <div class='form-group'>
                        {!! Form::textarea('body', '', 
                            ['rows'=> '3', 'maxlength' => '140', 'class' => 'form-control', 'placeholder' => 'What\'s on your mind ?']) !!}
                        </div>
                        <div class='form-group'>
                        {!! Form::submit('submit', ['class' => 'btn btn-primary  pull-right']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
                <div id="hi" class="panel-body tab-pane fade in ">
                    {!! Form::open(['action' => 'HighSocialPostController@store']) !!}
                        <div class='form-group'>
                        {!! Form::textarea('body', '', 
                            ['rows'=> '3', 'class' => 'form-control', 'placeholder' => 'What\'s on your mind ?']) !!}
                        </div>
                        <div class='form-group'>
                        {!! Form::submit('submit', ['class' => 'btn btn-primary  pull-right']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
                </div>
            </div>

