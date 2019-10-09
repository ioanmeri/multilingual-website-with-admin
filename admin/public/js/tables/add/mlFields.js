var el = {
	btn: $('#endis-ml-fields'),
	btnIcon: $('#endis-ml-fields span i'),
	mlFields: $('#ml-fields'),
	mlFieldsActiveInput: $('input[name="mlEnabled"]'),
	dateDiv: $('section.ml-date > div'),
};

var markUp = {
	date: `<input type="checkbox" name="mlDate" class="custom-control-input" id="ml-date"><label class="custom-control-label" for="ml-date">Date Added</label>`,
};

/* Ml Fields Btn Controller */
(function(){
	$mlFieldsEnabled = false;

	$('#endis-ml-fields').click(function(e){
		if(!$mlFieldsEnabled){
			mlFieldsEnDisBtn(1);
			mlFieldsActiveInput(1);
			mlFieldsShow(1);
			mlFieldsDate(1);
			$mlFieldsEnabled = true;
		}else{
			mlFieldsEnDisBtn(0);
			mlFieldsActiveInput(0);
			mlFieldsShow(0);
			mlFieldsDate(0);
			$mlFieldsEnabled = false;
		}
		
		console.log($mlFieldsEnabled);
	})
})()

function mlFieldsActiveInput($value){
	if($value){
		el.mlFieldsActiveInput.prop('checked', true);
	}else{
		el.mlFieldsActiveInput.prop('checked', false);
	}

	console.log(el.mlFieldsActiveInput.prop('checked'), 'active ml fields');
}


function mlFieldsShow($value){
	if($value){
		el.mlFields.removeClass('d-none');
	}else{
		el.mlFields.addClass('d-none');
	}
}

function mlFieldsEnDisBtn($value){
	if($value){
		el.btnIcon.removeClass('fa-close');
		el.btnIcon.addClass('fa-check');
		el.btn.removeClass('btn-light');
		el.btn.addClass('btn-success');
	}else{
		el.btnIcon.removeClass('fa-check');
		el.btnIcon.addClass('fa-close');
		el.btn.addClass('btn-light');
		el.btn.removeClass('btn-success');
	}
}

function mlFieldsDate($value){
	if($value){
		el.dateDiv.append(markUp.date);
	}else{
		el.dateDiv.html('');
	}
}
