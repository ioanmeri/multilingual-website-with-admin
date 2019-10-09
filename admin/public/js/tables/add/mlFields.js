var el = {
	btn: $('#endis-ml-fields'),
	btnIcon: $('#endis-ml-fields span i'),
	mlFields: $('#ml-fields')
}

console.log(el);

(function(){
	$mlFieldsEnabled = false;

	$('#endis-ml-fields').click(function(e){
		if(!$mlFieldsEnabled){
			mlFieldsEnDisBtn(1);
			mlFieldsEnDis(1);
			$mlFieldsEnabled = true;
		}else{
			mlFieldsEnDisBtn(0);
			mlFieldsEnDis(0);
			$mlFieldsEnabled = false;
		}
		
		console.log($mlFieldsEnabled);
	})
})()


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


function mlFieldsEnDis($value){
	if($value){
		el.mlFields.removeClass('d-none');
	}else{
		el.mlFields.addClass('d-none');
	}
}
