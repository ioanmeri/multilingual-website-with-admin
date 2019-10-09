function createVarcharRow($id){
	$markUp = `
		<div class="row d-flex align-items-center mb-4 mb-sm-3">
			<div class="col-sm-3 col-6 mb-2 mb-sm-0">
				<input type="text" name="varchar_title_${$id}" class="form-control" placeholder="Varchar Title"  required="required">
			</div>
			<div class="col-sm-3 col-6 mb-2 mb-sm-0">
				<input type="number" name="varchar_value_${$id}" class="form-control" min="0" placeholder="Values">
			</div>
			<div class="col-sm-3 col-6">
				<div class="custom-control custom-checkbox">
				    <input type="checkbox" name="varchar_default_${$id}" class="custom-control-input" id="varchar_default_${$id}">
				    <label class="custom-control-label text-white" for="varchar_default_${$id}">NULL</label>
				</div>
			</div>
			<div class="col-sm-3 col-6">
				<button type="button" class="btn btn-danger remove-varchar btn-sm"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		`;
	return $markUp;
}

(function () {
	$varchars = 0;

	/* Add Integer Button */
	$('#add-varchar').click(function(el){
		if($varchars === 0){
			$('.varchars-rows').show();
		}

		$varchars++;

		$('.varchars-rows').append(createVarcharRow($varchars));
		
	})

	/* Remove Integer Button */
	$('.varchars-rows').on('click', '.remove-varchar', function(e){
		e.preventDefault();
		$(this).closest(".row").remove(); 

		//if only the table head ==> is equal to .row(length) = 1
		if($('.varchars-rows .row').length === 1){
			$('.varchars-rows').hide();
			$varchars = 0;
		}
	});

})();
