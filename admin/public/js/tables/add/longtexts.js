function createLongtextRow($id){
	$markUp = `
		<div class="row d-flex align-items-center mb-4 mb-sm-3">
			<div class="col-sm-4 col-6 mb-2 mb-sm-0">
				<input type="text" name="longtext_title_${$id}" class="form-control" placeholder="Longtext Title"  required="required">
			</div>
			<div class="col-sm-4 col-3">
				<div class="custom-control custom-checkbox">
				    <input type="checkbox" name="longtext_default_${$id}" class="custom-control-input" id="longtext_default_${$id}">
				    <label class="custom-control-label text-white" for="longtext_default_${$id}">NULL</label>
				</div>
			</div>
			<div class="col-sm-4 col-3">
				<button type="button" class="btn btn-danger remove-longtext btn-sm"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		`;
	return $markUp;
}

(function () {
	$longtexts = 0;

	/* Add Integer Button */
	$('#add-longtext').click(function(el){
		if($longtexts === 0){
			$('.longtexts-rows').show();
		}

		$longtexts++;

		$('.longtexts-rows').append(createLongtextRow($longtexts));
		
	})

	/* Remove Longtext Button */
	$('.longtexts-rows').on('click', '.remove-longtext', function(e){
		e.preventDefault();
		$(this).closest(".row").remove(); 

		//if only the table head ==> is equal to .row(length) = 1
		if($('.longtexts-rows .row').length === 1){
			$('.longtexts-rows').hide();
			$longtexts = 0;
		}
	});

})();
