function createRow($id){
	$markUp = `
		<div class="row d-flex align-items-center mb-4 mb-sm-3">
			<div class="col-sm-3 col-6 mb-2 mb-sm-0">
				<input type="text" name="int_title_${$id}" class="form-control" placeholder="Column Title"  required="required">
			</div>
			<div class="col-sm-3 col-6 mb-2 mb-sm-0">
				<input type="number" name="int_value_${$id}" class="form-control" min="0" placeholder="Values">
			</div>
			<div class="col-sm-3 col-6">
				<div class="custom-control custom-checkbox">
				    <input type="checkbox" name="int_default_${$id}" class="custom-control-input" id="int_default_${$id}">
				    <label class="custom-control-label text-white" for="int_default_${$id}">NULL</label>
				</div>
			</div>
			<div class="col-sm-3 col-6">
				<button type="button" class="btn btn-danger remove-integer btn-sm"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		`;
	return $markUp;
}

(function () {
	$visibleIntRows = false;
	$integers = 0;

	/* Add Integer Button */
	$('#add-integer').click(function(el){
		if($integers === 0){
			$('.integers-rows').show();
			$visibleIntRows = true;
		}

		$integers++;

		$('.integers-rows').append(createRow($integers));
		
	})

	/* Remove Integer Button */
	$('.integers-rows').on('click', '.remove-integer', function(e){
		e.preventDefault();
		$(this).closest(".row").remove(); 

		//if only the table head == .row length = 1
		if($('.integers-rows .row').length === 1){
			$('.integers-rows').hide();
			$integers = 0;
		}
	});

})();
