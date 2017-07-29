@extends('layouts.app')
@section('head')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
#cover {
	height:280px; 
	background:black;
	padding:0;
}
.cover {
	width:100%;
	height: 100%
}
#cover_pic {
	width:100%;
	height:280px;
}
#cover_pic img {
	width: 100%;
	height: 280px;
}
.profile {
	width:150px;
	height:150px;
	position: absolute;
	top:180px;
	left: 50px;
	background:black;
	border:1px solid white;
	z-index:1;
}
.profile img {
	width:148px;
	height:148px;
}
.overlay {
  position: absolute;
  height: 100%;
  width: 100%;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  opacity: 0;
  transition: .5s ease;
  background-color: rgba(20, 20, 20, 0.4);
}
.profile:hover .overlay-profile {
  opacity: 1;
}

.cover:hover .overlay-cover {
  opacity: 1;
}
.overlay .btn {
  color: white;
  position: absolute;
  width:100%;
  background: rgba(20, 20, 20, 0.7);
  text-align: center;
  font-weight: bold;

}
.overlay-profile .btn {
	bottom: 0;
	height:35px;
}
.overlay-cover .btn {
	top : 0;
	height: 25%;
}
#frame {
    position: fixed; /* Sit on top of the page content */
    display: none; /* Hidden by default */
    width: 70%; /* Full width (cover the whole page) */
    height: 70%; /* Full height (cover the whole page) */
    min-height: calc(50% + 200px);
    top: 15%;
    left:15%;
    right: 15%;
    bottom: 15%;
    background-color: rgba(50, 50, 50, 0.95);
    z-index: 2; /* Specify a stack order in case you're using a different order for other elements */
}
</style>
@endsection
@section('content')
@include('layouts.profileUpdate') 
<div class="container">
	<div class="row">
		<div id="cover" class="col-lg-10 col-lg-offset-1 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
			<div id="cover_pic"><img id="cover_img" src="{{ $user_additional->cover_pic }}"></div>
		<div class="cover">
		<div class="overlay overlay-cover">
    		<label for="cover_image"  class='btn btn-link'>Update Cover Pic</label>
    		<input id="cover_image" type="file" name="image" class="form-control" style="display: none">
  		</div>
  		</div>
		<div class='profile'>
		<img src="{{ $user_additional->profile_pic }}"  class="img-thumbnail">
		<div class="overlay overlay-profile">
    		<button onclick="on()" class='btn btn-link'>Update Profile Pic</button>
  		</div>
  		</div>
		<div style="width:150px; position: absolute; top:220px; left: 230px; background:transparent ;color:white; font-size: 18px; font-weight:bold;">
		<p> {!! Auth::user()->name !!}</p>
		</div>
	</div>
	</div>
	<div class=row>
				<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 alert alert-danger print-error-msg" style="display:none">
					<ul></ul>
				</div>
				</div>
	<div class="row" style="margin-top: 55px">
        <div class="col-lg-3 col-lg-offset-1 col-md-3 col-sm-3 col-md-offset-2 col-sm-offset-2">
        	@include('additional.viewAdd')
        	@if ($user_additional->intro_text == NULL )
        		@include('additional.introAdd')
        	@endif
        	@if ($user_additional->username == NULL or $user_additional->username == Auth::user()->id)
        		@include('additional.usernameAdd')
        	@endif
        	@if($user_additional->birthday == NULL)
        		@include('additional.birthdayAdd')
        	@endif
        	@if ($user_additional->born_at == NULL)
        		@include('additional.bornatAdd')
        	@endif
        	@if ($user_additional->lives_at == NULL)
        		@include('additional.livesatAdd')
        	@endif
        	@if ($user_additional->relationship == NULL)
        		@include('additional.relationshipAdd')
        	@endif
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5">
            @include('layouts.postForm')
                    @foreach ($user_posts as $post)
                        @include('layouts.postView')
                    @endforeach
                    @foreach ($fb_posts as $post)
                        @include('layouts.postView')
                    @endforeach
                    @if (count($user_posts) == 0 and count($fb_posts) ==0)
                        <div class="panel-body">
                            <br>
                            <p class="lead"> Nothing to view yet ! </p>
                            <br>
                        </div>
                    @endif
            </div>
        </div>
 </div>
 <script>
 function on() {
    document.getElementById("frame").style.display = "block";
}

function off() {
    document.getElementById("frame").style.display = "none";
}
					function saveCover(){
					var file    = document.querySelector('input[type=file]').files[0];
					var preview = document.querySelector('#cover_img'); //selects the query named img
					$(".print-error-msg").find("ul").html('');
					$(".print-error-msg").css('display','none');

						var form = document.createElement("form");
    					form.setAttribute("method", "post");
    					form.setAttribute("action", "/ajaxImageUpload");
    					form.setAttribute("enctype", "multipart/form-data");
    					var params = {"title" : "HELLO", "image" : preview.src, _token:'{{ csrf_token() }}', 'type' : 1}
    					for(var key in params) {
        					if(params.hasOwnProperty(key)) {
            				var hiddenField = document.createElement("input");
            				hiddenField.setAttribute("type", "hidden");
            				hiddenField.setAttribute("name", key);
            				hiddenField.setAttribute("value", params[key]);

            				form.appendChild(hiddenField);
         					}
    					}

				    	document.body.appendChild(form);
    					form.submit();
					
				}
				function cancelCover(){
					var save = document.getElementById('cover_save');
					var cancel = document.getElementById('cover_cancel');
					document.getElementById('cover').removeChild(save);
					document.getElementById('cover').removeChild(cancel);

					var preview = document.querySelector('#cover_img');
					preview.src = "{{ $user_additional->cover_pic }}";
				}
$(document).ready(function() {
				$("#cover_image").on('change', function(){
					var preview = document.querySelector('#cover_img'); //selects the query named img
       				var file    = document.querySelector('#cover_image').files[0]; //sames as here
       				var reader  = new FileReader();

       				reader.onloadend = function () {
           				preview.src = reader.result;
       				}
					if (file) {
						var fileType = file["type"];
						var ValidImageTypes = ["image/jpeg", "image/png"];
						if ($.inArray(fileType, ValidImageTypes) < 0) {
  							printErrorMsg({"Invalid" : "Invalid Image please select a jpg or png image"});
						}
						else {
							$(".print-error-msg").find("ul").html('');
							$(".print-error-msg").css('display','none');
           					reader.readAsDataURL(file); //reads the data as a URL
           					var save = document.querySelector('#cover_save');
           					if (! save) {
           						var save = document.createElement("button");
           						save.setAttribute("class", "btn btn-primary");
           						save.setAttribute("style", "position:absolute; top: 240px; right:1%");
           						save.setAttribute("id", "cover_save");
           						save.setAttribute("onclick", "saveCover()");
           						save.innerHTML =  "Save Cover";
           						document.querySelector('#cover').appendChild(save);

           						var cancel = document.createElement("button");
           						cancel.setAttribute("class", "btn btn-primary");
           						cancel.setAttribute("style", "position:absolute; top: 240px; right:15%");
           						cancel.setAttribute("id", "cover_cancel");
           						cancel.setAttribute("onclick", "cancelCover()");
           						cancel.innerHTML =  "Cancel Cover";
           						document.querySelector('#cover').appendChild(cancel);
           					}
           				}
       				} else {
           				printErrorMsg({"Invalid" : "Invalid Image please select a jpg or png valid image"});
       				}
				});
				function printErrorMsg (msg) {
				$(".print-error-msg").find("ul").html('');
				$(".print-error-msg").css('display','block');
				$.each( msg, function( key, value ) {
					$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
				});
			}
});
</script>
@endsection