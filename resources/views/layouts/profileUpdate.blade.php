 <div id="frame">
 	<div class="panel panel-default" style="height: 100%;background-color: transparent;color: white;">
 		<div class="panel-heading" style="background-color: transparent;color: white;">
 			<p>Update Profile Picture</p>
 		</div>
 		<div class="panel-body" style="height: 100%">
 		<div class="row" style="height: 100%">
 			<div class="col-md-6 col-sm-6" style="height: 100%">
 				<img id="updateImg" style="width:70%; height:70%;border: 1px solid white;" src="{{ $user_additional->profile_pic }}">
 			</div>
 			<div class="col-md-6 col-sm-6" style="height: 100%">
				<div class="alert alert-danger print-error-msg" style="display:none">
					<ul></ul>
				</div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group" style="height: 48%">
					<label for="image" style="text-align: center;padding-top:17%;cursor: pointer; width:50%; height:70%; border: 1px solid currentColor; margin:0% 24%">Upload Image</label>
					<input id="image" type="file" name="image" class="form-control" style="opacity: 0">
				</div>
				<div class="form-group" style="height: 48%">
					<label>Add Description :</label>
					<input id="desc" type="text" name="title" class="form-control" placeholder="Add Description" style="background:transparent;">
				</div>
			</div>
			</div>
		</div>
 		<div class="panel-footer" style="position: absolute; width:calc(100% - 2px); bottom: 0;background: transparent;">
 			<button class='btn btn-primary pull-right update-now'>Update</button>
 			<button onclick="off()" class='btn btn-link pull-right '>Cancel</button>
 		</div>
 	</div>
 			<script type="text/javascript">
			$(document).ready(function(){
				$("#image").on('change', function(){
					var preview = document.querySelector('#updateImg'); //selects the query named img
       				var file    = document.querySelector('input[type=file]').files[0]; //sames as here
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
           				}
       				} else {
           				printErrorMsg({"Invalid" : "Invalid Image please select a jpg or png valid image"});
       				}
				});
				$(".update-now").click(function(){
					var file    = document.querySelector('input[type=file]').files[0];
					var preview = document.querySelector('#updateImg'); //selects the query named img
					var desc = document.querySelector('#desc');
					if (desc.value.length < 15){
						printErrorMsg({"Invalid" : "Please Fill In the Description"});	
					}else {
						$(".print-error-msg").find("ul").html('');
						$(".print-error-msg").css('display','none');

						var form = document.createElement("form");
    					form.setAttribute("method", "post");
    					form.setAttribute("action", "/ajaxImageUpload");
    					form.setAttribute("enctype", "multipart/form-data");
    					var params = {"title" : desc.value, "image" : preview.src, _token:'{{ csrf_token() }}'}
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
				});
			});
			function printErrorMsg (msg) {
				$(".print-error-msg").find("ul").html('');
				$(".print-error-msg").css('display','block');
				$.each( msg, function( key, value ) {
					$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
				});
			}
		</script>
 </div>
