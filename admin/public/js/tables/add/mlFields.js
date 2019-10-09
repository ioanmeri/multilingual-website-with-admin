var el = {
	btn: $('#endis-ml-fields'),
	btnIcon: $('#endis-ml-fields span i'),
	mlFields: $('#ml-fields'),
	dateDiv: $('section.ml-date > div')
};

var markUp = {
	date: `<input type="checkbox" class="custom-control-input" id="ml-date"><label class="custom-control-label" for="ml-date">Date Added</label>`,
};

/* Ml Fields Btn Controller */
(function(){
	$mlFieldsEnabled = false;

	$('#endis-ml-fields').click(function(e){
		if(!$mlFieldsEnabled){
			mlFieldsEnDisBtn(1);
			mlFieldsShow(1);
			mlFieldsDate(1);
			$mlFieldsEnabled = true;
		}else{
			mlFieldsEnDisBtn(0);
			mlFieldsShow(0);
			mlFieldsDate(0);
			$mlFieldsEnabled = false;
		}
		
		console.log($mlFieldsEnabled);
	})
})()

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
