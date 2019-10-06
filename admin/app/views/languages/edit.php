<?php require APPROOT . '/views/inc/header.php'; ?>
	<section class="section-languages pl-3 pr-3">
		<?php flash('text_message'); ?>
		<a href="<?php echo URLROOT; ?>/languages" class="btn btn-light mt-3"><i class="fa fa-backward"></i> Back</a>
		<h1 class="mt-4">Edit Language</h1>
		<p>Edit the language with the form below</p>
		<form action="<?php echo URLROOT; ?>/languages/edit/<?php echo $data['language']->id; ?>" method="post">
			<div class="form-group">
				<label for="title">Title: <sup>*</sup></label>
				<input type="text" name="title" id="" value="<?php echo $data['language']->title; ?>" class="form-control form-control-lg text-capitalize <?php echo empty($data['title_err']) ? '' : 'is-invalid'; ?>" style="font-size: 2rem;">
				<span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
			</div>
			<div class="container-fluid bg-light mb-4">
				<div class="row">
					<div class="col-md-3 col-sm-6 p-3">
						<p>Svg Icon</p>
						<?php echo $data['language']->image; ?>
					</div>
					<div class="col-md-3 col-sm-6 p-3">
						<div class="form-group">
							<label for="code">Code</label>
							<input type="text" class="form-control form-control-lg <?php echo empty($data['code_err']) ? '' : 'is-invalid'; ?>" name="code" value="<?php echo $data['language']->code; ?>">
							<span class="invalid-feedback"><?php echo $data['code_err']; ?></span>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 p-3">
						<div class="form-group">
							<label for="sort_order">Sort Order</label>
							<input type="number" class="form-control form-control-lg <?php echo empty($data['sort_order_err']) ? '' : 'is-invalid'; ?>" name="sort_order" value="<?php echo $data['language']->sort_order; ?>">
							<span class="invalid-feedback"><?php echo $data['sort_order_err']; ?></span>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 p-3">
						<p>Active</p>
						<div class="onoffswitch">
							<input type="checkbox" name="activeLanguage" class="onoffswitch-checkbox" id="myonoffswitch" <?php echo $data['language']->active ? 'checked' : ''; ?>>
							<label class="onoffswitch-label" for="myonoffswitch">
							  <div class="onoffswitch-inner"></div>
							  <div class="onoffswitch-switch"></div>
							</label>
						</div>
					</div>
				</div>
			</div>
			<input type="submit" class="btn btn-success" value="Submit">
		</form>
	</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>
