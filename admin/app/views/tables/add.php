<?php require APPROOT . '/views/inc/header.php'; ?>
<section class="section-tables m-3 elegant-color">
	<a href="<?php echo URLROOT; ?>/tables" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
	<?php flash('text_message'); ?>
	<h1 class="mt-3">Add Table</h1>
	<p>Add a Database Table with the following form</p>

	<div class="card">
		<h4 class="bg-light px-2 py-3">Basic Table</h4>
		<form action="<?php echo URLROOT ?>/tables/add" method="post" class="card-body">
			<div class="d-flex align-items-center">
				<div class="form-group mr-4" style="max-width: 12rem;">
					<label for="prefix">Prefix: <sup>*</sup></label>
					<input type="text" name="prefix" class="form-control form-control-sm <?php echo empty($data['prefix_err']) ? '' : 'is-invalid'; ?>" value="<?php echo $data['prefix']; ?>">
					<span class="invalid-feedback"><?php echo $data['prefix_err']; ?></span>
				</div>
				<div class="form-group mr-4" style="max-width: 5rem;">
					<label for="images">Images</label>
					<input type="number" class="form-control form-control-sm" name="images" value="<?php echo $data['images']; ?>">
					<span class="invalid-feedback"><?php echo $data['images']; ?></span>
				</div>
				<div class="custom-control custom-checkbox">
				    <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
				    <label class="custom-control-label" for="defaultUnchecked">Date Added</label>
				</div>
			</div>

			<h4 class="mt-4">Multilingual fields</h4>
			<input type="submit" value="Submit" class="btn btn-success mt-3">
		</form>
	</div>


</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>
