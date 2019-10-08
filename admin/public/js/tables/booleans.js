function createBoolRow($id){
	$markUp = `
		<div class="row d-flex align-items-center mb-4 mb-sm-3">
			<div class="col-sm-4 col-6 mb-2 mb-sm-0">
				<input type="text" name="bool_title_${$id}" class="form-control" placeholder="Boolean Title"  required="required">
			</div>
			<div class="col-sm-4 col-3">
				<div class="custom-control custom-checkbox">
				    <input type="checkbox" name="bool_default_${$id}" class="custom-control-input" id="bool_default_${$id}">
				    <label class="custom-control-label text-white" for="bool_default_${$id}">NULL</label>
				</div>
			</div>
			<div class="col-sm-4 col-3">
				<button type="button" class="btn btn-danger remove-boolean btn-sm"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		`;
	return $markUp;
}

(function () {
	$booleans = 0;

	/* Add Integer Button */
	$('#add-boolean').click(function(el){
		if($booleans === 0){
			$('.booleans-rows').show();
		}

		$booleans++;

		$('.booleans-rows').append(createBoolRow($booleans));
		
	})

	/* Remove Integer Button */
	$('.booleans-rows').on('click', '.remove-boolean', function(e){
		e.preventDefault();
		$(this).closest(".row").remove(); 

		//if only the table head ==> is equal to .row(length) = 1
		if($('.booleans-rows .row').length === 1){
			$('.booleans-rows').hide();
			$booleans = 0;
		}
	});

})();
