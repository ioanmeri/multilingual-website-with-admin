function createImgRow(){
	$markUp = `
		<div class="bg-light p-3 d-flex align-items-center flex-wrap mb-3">
			<div class="form-group mr-4" style="max-width: 5rem;">
				<label for="images">Number</label>
				<input type="number" class="form-control form-control-sm" name="images" min="0" max="10" value="<?php echo $data['images']; ?>" required>
				<span class="invalid-feedback"><?php echo $data['images']; ?></span>
			</div>
			<div class="custom-control custom-checkbox mr-4">
			    <input type="checkbox" name="img_sm" class="custom-control-input" id="img_sm">
			    <label class="custom-control-label" for="img_sm">Small</label>
			</div>
			<div class="custom-control custom-checkbox mr-4">
			    <input type="checkbox" name="img_md" class="custom-control-input" id="img_md">
			    <label class="custom-control-label" for="img_md">Medium</label>
			</div>
			<div class="custom-control custom-checkbox mr-4">
			    <input type="checkbox" name="img_lg" class="custom-control-input" id="img_lg">
			    <label class="custom-control-label" for="img_lg">Large</label>
			</div>
			<div class="custom-control custom-checkbox mr-4">
			    <input type="checkbox" name="img_xl" class="custom-control-input" id="img_xl">
			    <label class="custom-control-label" for="img_xl">Extra large</label>
			</div>
		</div>
	`;
	return $markUp;
}

(function () {
	$areImagesVisible = false;

	/* Add Remove Images Button */
	$('#add-remove-images').click(function(el){
		if(!$areImagesVisible){
			$('.images-rows').show();
			$('.images-rows').append(createImgRow());
			$('.images #add-remove-images i').removeClass('fa-plus');
			$('.images #add-remove-images').addClass('bg-danger');
			$('.images #add-remove-images i').addClass('fa-minus');
			$areImagesVisible = true;
		}else{
			$('.images-rows').hide();
			$('.images-rows').html('');
			$('.images #add-remove-images i').removeClass('fa-minus');
			$('.images #add-remove-images').removeClass('bg-danger');
			$('.images #add-remove-images i').addClass('fa-plus');
			$areImagesVisible = false;
		}
	})

})();
