<?php require APPROOT . '/views/inc/header.php'; ?>
<section class="section-tables m-3 elegant-color">
	<a href="<?php echo URLROOT; ?>/tables" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
	<?php flash('text_message'); ?>
	<h1 class="mt-3">Add Table</h1>
	<p>Add a Database Table with the following form</p>

	<div class="card">
		<h4 class="bg-light px-2 py-3">Basic Table</h4>
		<form action="<?php echo URLROOT ?>/tables/add" method="post" class="card-body">
			<div id="basic-fields" class="mb-5">
				<h3 class="mb-3">Basic Fields</h3>
				<section class="basic-info d-flex align-items-center mb-2">
					<div class="form-group mr-4" style="max-width: 12rem;">
						<label for="prefix">Prefix: <sup>*</sup></label>
						<input type="text" name="prefix" class="form-control form-control-sm <?php echo empty($data['prefix_err']) ? '' : 'is-invalid'; ?>" value="<?php echo $data['prefix']; ?>"  required="required">
						<span class="invalid-feedback"><?php echo $data['prefix_err']; ?></span>
					</div>
					<div class="custom-control custom-checkbox">
					    <input type="checkbox" name="basicDate" class="custom-control-input" id="defaultUnchecked">
					    <label class="custom-control-label" for="defaultUnchecked">Date Added</label>
					</div>
				</section>
				<section class="images mb-4">
					<h4><span class="mr-2"><i class="fa fa-image"></i></span>Images</h4>
					<div class="images-rows">
					</div>
					<button type="button" class="btn btn-dark" id="add-remove-images"><i class="fa fa-plus"></i></button>
				</section>
				<section class="integers mb-4">
					<h4>Integers</h4>
					<div class="integers-rows container-fluid bg-dark px-2 py-3 mb-2">
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
					</div>
					<button type="button" class="btn btn-dark" id="add-integer"><i class="fa fa-plus"></i></button>
				</section>
				<section class="booleans mb-4">
					<h4>Booleans</h4>
					<div class="booleans-rows container-fluid bg-dark px-2 py-3 mb-2">
						<div class="row d-none d-sm-flex">
							<div class="col-sm-4 col-6 mb-2">
								<h5 class="text-white pb-2 border-bottom">Boolean Title</h5>
							</div>
							<div class="col-sm-4 col-6 mb-2">
								<h5 class="text-white pb-2 border-bottom">Default</h5>
							</div>
							<div class="col-sm-4 col-6 mb-2">
								<h5 class="text-white pb-2 border-bottom">Remove</h5>
							</div>
						</div>
					</div>
					<button type="button" class="btn btn-dark" id="add-boolean"><i class="fa fa-plus"></i></button>
				</section>
			</div>
			<div id="ml-fields-cont" class="mb-4">
				<button type="button" class="btn btn-light d-flex align-items-center mb-3" id="endis-ml-fields">
					<span class="mr-2"><i class="fa fa-close fa-2x"></i></span>
					<h3 class="m-0">Multilingual fields</h3>
				</button>
				<div id="ml-fields" class="border-left pl-4 d-none">
					<input type="checkbox" name="mlEnabled" hidden>
					<section class="ml-date mb-3">
							<div class="custom-control custom-checkbox">
<!-- 						    <input type="checkbox" class="custom-control-input" id="ml-date">
						    <label class="custom-control-label" for="ml-date">Date Added</label> -->
						</div>
					</section>
					<section class="varchars mb-4">
						<h4>Varchars</h4>
						<div class="varchars-rows container-fluid bg-dark px-2 py-3 mb-2">
							<div class="row d-none d-sm-flex">
								<div class="col-sm-3 col-6 mb-2">
									<h5 class="text-white pb-2 border-bottom">Varchar Title</h5>
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
						</div>
						<button type="button" class="btn btn-dark" id="add-varchar"><i class="fa fa-plus"></i></button>
					</section>
					<section class="texts mb-4">
						<h4>Texts</h4>
						<div class="texts-rows container-fluid bg-dark px-2 py-3 mb-2">
							<div class="row d-none d-sm-flex">
								<div class="col-sm-4 col-6 mb-2">
									<h5 class="text-white pb-2 border-bottom">Text Title</h5>
								</div>
								<div class="col-sm-4 col-6 mb-2">
									<h5 class="text-white pb-2 border-bottom">Default</h5>
								</div>
								<div class="col-sm-4 col-6 mb-2">
									<h5 class="text-white pb-2 border-bottom">Remove</h5>
								</div>
							</div>
						</div>
						<button type="button" class="btn btn-dark" id="add-text"><i class="fa fa-plus"></i></button>
					</section>
					<section class="longtexts mb-4">
						<h4>Longtexts</h4>
						<div class="longtexts-rows container-fluid bg-dark px-2 py-3 mb-2">
							<div class="row d-none d-sm-flex">
								<div class="col-sm-4 col-6 mb-2">
									<h5 class="text-white pb-2 border-bottom">Longtext Title</h5>
								</div>
								<div class="col-sm-4 col-6 mb-2">
									<h5 class="text-white pb-2 border-bottom">Default</h5>
								</div>
								<div class="col-sm-4 col-6 mb-2">
									<h5 class="text-white pb-2 border-bottom">Remove</h5>
								</div>
							</div>
						</div>
						<button type="button" class="btn btn-dark" id="add-longtext"><i class="fa fa-plus"></i></button>
					</section>
				</div>
			</div>
			<input type="submit" value="Submit" class="btn btn-success mt-2">
		</form>
	</div>
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>
