/* Ml Fields Btn Controller */
(function(){
	$mlFieldsEnabled = false;
	$captions = false;

	$('#endis-ml-fields').click(function(e){
		if(!$mlFieldsEnabled){
			mlFieldsEnDisBtn(1);
			mlFieldsActiveInput(1);
			mlFieldsShow(1);
			mlFieldsDate(1);
			$mlFieldsEnabled = true;
			// if images are added -> add caption checkbox
			if(!$captions && !$('.images-rows').html().trim() == ''){
				el.imgCaptionsDiv.append(markUp.captionsCheck);
				$captions = true;
			}
		}else{
			mlFieldsEnDisBtn(0);
			mlFieldsActiveInput(0);
			mlFieldsShow(0);
			mlFieldsDate(0);
			$mlFieldsEnabled = false;
			if($captions && $('.images-rows').html().trim() == ''){
				el.imgCaptionsDiv.html('');
				$captions = false;
			}
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
