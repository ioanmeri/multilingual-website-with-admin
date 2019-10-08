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
					<input type="text" name="prefix" class="form-control form-control-sm <?php echo empty($data['prefix_err']) ? '' : 'is-invalid'; ?>" value="<?php echo $data['prefix']; ?>"  required="required">
					<span class="invalid-feedback"><?php echo $data['prefix_err']; ?></span>
				</div>
				<div class="form-group mr-4" style="max-width: 5rem;">
					<label for="images">Images</label>
					<input type="number" class="form-control form-control-sm" name="images" min="0" max="10" value="<?php echo $data['images']; ?>">
					<span class="invalid-feedback"><?php echo $data['images']; ?></span>
				</div>
				<div class="custom-control custom-checkbox">
				    <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
				    <label class="custom-control-label" for="defaultUnchecked">Date Added</label>
				</div>
			</div>
			<div id="add-basic-fields">
				<section class="add-integers">
					<h4>Integers</h4>
					<div class="container-fluid bg-dark px-2 py-3">
						<div class="row d-none d-sm-flex">
							<div class="col-sm-3 col-6 mb-2">
								<h5 class="text-white pb-2 border-bottom">Column Title</h5>
							</div>
							<div class="col-sm-3 col-6 mb-2">
								<h5 class="text-white pb-2 border-bottom">Values</h5>
							</div>
							<div class="col-sm-3 col-6 mb-2">
								<h5 class="text-white pb-2 border-bottom">Default</h5>
							</div>
							<div class="col-sm-3 col-6 mb-2">
								<h5 class="text-white pb-2 border-bottom">Remove</h5>
							</div>
						</div>
						<div class="row d-flex align-items-center mb-4 mb-sm-3">
							<div class="col-sm-3 col-6 mb-2 mb-sm-0">
								<input type="text" name="int_title_1" class="form-control" placeholder="Column Title"  required="required">
							</div>
							<div class="col-sm-3 col-6 mb-2 mb-sm-0">
								<input type="number" name="int_value_1" class="form-control" min="0" placeholder="Values">
							</div>
							<div class="col-sm-3 col-6">
								<div class="custom-control custom-checkbox">
								    <input type="checkbox" name="int_default_1" class="custom-control-input" id="int_default_1">
								    <label class="custom-control-label text-white" for="int_default_1">NULL</label>
								</div>
							</div>
							<div class="col-sm-3 col-6">
								<button class="btn btn-danger remove-integer btn-sm"><i class="fa fa-minus"></i></button>
							</div>
						</div>
					</div>
					<button type="button" class="btn btn-dark mt-3" id="add-integer"><i class="fa fa-plus"></i></button>
					<div class="btn"></div>
				</section>
			</div>
			<h4 class="mt-4">Multilingual fields</h4>
			<input type="submit" value="Submit" class="btn btn-success mt-3">
		</form>
	</div>
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>
