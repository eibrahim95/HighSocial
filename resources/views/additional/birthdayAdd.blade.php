<div class="panel panel-default">
	<div class="panel-heading">
		<p>Add your birthday</p>
	</div>
	<div class="panel-body">
		{!! Form::open(['action' => 'AdditionalInfoController@store', 'onsubmit' => 'submitForm()']) !!}
			<div class="nativeDatePicker">
      			<label for="bday"></label>
      			<input type="date" id="bday" name="birthday" value="{!! \Carbon\Carbon::now()->toDateString() !!}">
      			<span class="validity"></span>
    		</div>
    		<p class="fallbackLabel"></p>
    		<div class="fallbackDatePicker">
      			<span>
        			<label for="day"></label>
        			<select id="day" name="day">
        			</select>
      			</span>
      			<span>
        			<label for="month"></label>
        			<select id="month" name="month">
          				<option selected>January</option>
          				<option>February</option>
          				<option>March</option>
          				<option>April</option>
          				<option>May</option>
          				<option>June</option>
          				<option>July</option>
          				<option>August</option>
          				<option>September</option>
          				<option>October</option>
          				<option>November</option>
          				<option>December</option>
        			</select>
      			</span>
      			<span>
        			<label for="year"></label>
        			<select id="year" name="year">
        			</select>
      			</span>
    		</div>
			<div class='form-group'>
				{!! Form::submit('save', ['class' => 'btn btn-primary  pull-right']) !!}
			</div>
		{!! Form::close() !!}
	</div>
	<script>
		var nativePicker = document.querySelector('.nativeDatePicker');
		var fallbackPicker = document.querySelector('.fallbackDatePicker');
		var fallbackLabel = document.querySelector('.fallbackLabel');

		var yearSelect = document.querySelector('#year');
		var monthSelect = document.querySelector('#month');
		var daySelect = document.querySelector('#day');

		// hide fallback initially
		fallbackPicker.style.display = 'none';
		fallbackLabel.style.display = 'none';

		// test whether a new date input falls back to a text input or not
		var test = document.createElement('input');
		test.type = 'date';
		// if it does, run the code inside the if() {} block
		if(test.type === 'text') {
  		// hide the native picker and show the fallback
  			nativePicker.style.display = 'none';
  			fallbackPicker.style.display = 'block';
  			fallbackLabel.style.display = 'block';

		// populate the days and years dynamically
  		// (the months are always the same, therefore hardcoded)
  			populateDays(monthSelect.value);
  			populateYears();
		}

		function populateDays(month) {
  		// delete the current set of <option> elements out of the
  		// day <select>, ready for the next set to be injected
  			while(daySelect.firstChild){
    		daySelect.removeChild(daySelect.firstChild);
  		}

  		// Create variable to hold new number of days to inject
  		var dayNum;

  		// 31 or 30 days?
  		if(month === 'January' | month === 'March' | month === 'May' | month === 'July' | month === 'August' | month === 'October' | month === 'December') {
    		dayNum = 31;
  		} else if(month === 'April' | month === 'June' | month === 'September' | month === 'November') {
    		dayNum = 30;
  		} else {
  		// If month is February, calculate whether it is a leap year or not
    		var year = yearSelect.value;
    		(year - 2016) % 4 === 0 ? dayNum = 29 : dayNum = 28;
  		}

  		// inject the right number of new <option> elements into the day <select>
  		for(i = 1; i <= dayNum; i++) {
    		var option = document.createElement('option');
    		option.textContent = i;
    		daySelect.appendChild(option);
  		}

  		// if previous day has already been set, set daySelect's value
  		// to that day, to avoid the day jumping back to 1 when you
  		// change the year
  		if(previousDay) {
    		daySelect.value = previousDay;

	    // If the previous day was set to a high number, say 31, and then
    	// you chose a month with less total days in it (e.g. February),
    	// this part of the code ensures that the highest day available
    	// is selected, rather than showing a blank daySelect
    		if(daySelect.value === "") {
      			daySelect.value = previousDay - 1;
    		}

    		if(daySelect.value === "") {
      			daySelect.value = previousDay - 2;
    		}

    		if(daySelect.value === "") {
      			daySelect.value = previousDay - 3;
    		}
  		}
	}

	function populateYears() {
  	// get this year as a number
  		var date = new Date();
  		var year = date.getFullYear();

  	// Make this year, and the 100 years before it available in the year <select>
  		for(var i = 0; i <= 100; i++) {
    		var option = document.createElement('option');
    		option.textContent = year-i;
    		yearSelect.appendChild(option);
  		}
	}

	// when the month or year <select> values are changed, rerun populateDays()
	// in case the change affected the number of available days
	yearSelect.onchange = function() {
  		populateDays(monthSelect.value);
	}

	monthSelect.onchange = function() {
  		populateDays(monthSelect.value);
	}

	//preserve day selection
	var previousDay;

	// update what day has been set to previously
	// see end of populateDays() for usage
	daySelect.onchange = function() {
  		previousDay = daySelect.value;
	}
	function submitForm() {
		var test = document.createElement('input');
		test.type = 'date';
		var birthday = document.getElementById('bday');
    	var day = document.getElementById('day');
    	var month = document.getElementById('month');
    	var year = document.getElementById('year');
		if(test.type === 'text') {
			var monthes = {'January' : 1, 'March' : 3, 'May' : 5, 'July' : 7, 'August' : 8, 'October' : 10, 'December' : 12,  
  				'April' : 4, 'June' : 6, 'September' : 9 ,'November' : 11 };
			birthday.value = year.value + '-' + monthes[month.value] + '-' + day.value;
    		day.parentNode.removeChild(day);
    		month.parentNode.removeChild(month);
    		year.parentNode.removeChild(year);
    	}
    	else {
    		day.parentNode.removeChild(day);
    		month.parentNode.removeChild(month);
    		year.parentNode.removeChild(year);	
    	}
  	}
</script>
</div>