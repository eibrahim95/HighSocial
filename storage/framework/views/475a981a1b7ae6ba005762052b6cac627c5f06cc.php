
<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#fb">Facebook Post</a></li>
                        <li><a data-toggle="tab" href="#mn">Twitter Tweet</a></li>
                        <li><a data-toggle="tab" href="#fb">Instagram Photo</a></li>
                        <li><a data-toggle="tab" href="#fb">HighSocial Post</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                <div id="fb" class="panel-body tab-pane fade in active">
                    <?php echo Form::open(['action' => 'FacebookPostController@store']); ?>

                    	<div class='form-group'>
    					<?php echo Form::textarea('body', '', 
                            ['rows'=> '3', 'class' => 'form-control', 'placeholder' => 'What\'s on your mind ?']); ?>

    					</div>
    					<div class='form-group'>
    					<?php echo Form::submit('submit', ['class' => 'btn btn-primary  pull-right']); ?>

    					</div>
					<?php echo Form::close(); ?>

                </div>
                <div id="mn" class="panel-body tab-pane fade in active">
                <p>flkfdvnj</p>
                </div>
                </div>
            </div>
        </div>
    </div>
