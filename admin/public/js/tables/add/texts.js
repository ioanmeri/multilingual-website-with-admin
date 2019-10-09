function createTextRow($id){
	$markUp = `
		<div class="row d-flex align-items-center mb-4 mb-sm-3">
			<div class="col-sm-4 col-6 mb-2 mb-sm-0">
				<input type="text" name="text_title_${$id}" class="form-control" placeholder="Text Title"  required="required">
			</div>
			<div class="col-sm-4 col-3">
				<div class="custom-control custom-checkbox">
				    <input type="checkbox" name="text_default_${$id}" class="custom-control-input" id="text_default_${$id}">
				    <label class="custom-control-label text-white" for="text_default_${$id}">NULL</label>
				</div>
			</div>
			<div class="col-sm-4 col-3">
				<button type="button" class="btn btn-danger remove-text btn-sm"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		`;
	return $markUp;
}

(function () {
	$texts = 0;

	/* Add Integer Button */
	$('#add-text').click(function(el){
		if($texts === 0){
			$('.texts-rows').show();
		}

		$texts++;

		$('.texts-rows').append(createTextRow($texts));
		
	})

	/* Remove Integer Button */
	$('.texts-rows').on('click', '.remove-text', function(e){
		e.preventDefault();
		$(this).closest(".row").remove(); 

		//if only the table head ==> is equal to .row(length) = 1
		if($('.texts-rows .row').length === 1){
			$('.texts-rows').hide();
			$texts = 0;
		}
	});

})();
