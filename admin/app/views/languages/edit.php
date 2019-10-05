<?php require APPROOT . '/views/inc/header.php'; ?>
	<section class="section-languages pl-3 pr-3">
		<?php flash('text_message'); ?>
		<a href="<?php echo URLROOT; ?>/languages" class="btn btn-light mt-3"><i class="fa fa-backward"></i> Back</a>
		<h1 class="mt-4">Edit Language</h1>
		<p>Edit the language with the form below</p>
		<form action="<?php echo URLROOT; ?>/languages/edit/<?php echo $data['language']->id; ?>" method="post">
			<input type="text" name="title" id="" value="<?php echo $data['language']->title; ?>" class="mt-4 mb-4 text-capitalize" style="font-size: 2rem;">
			<div class="container-fluid bg-light mb-4">
				<div class="row">
					<div class="col-md-3 col-sm-6 p-3">
						<h4 class="mb-3">Svg icon</h4>
						<?php echo $data['language']->image; ?>
<!-- 						<textarea name="icon" cols="30" rows="5"></textarea> -->
					</div>
					<div class="col-md-3 col-sm-6 p-3">
						<h4 class="mb-3">Code</h4>
						<input type="text" name="code" value="<?php echo $data['language']->code; ?>">
					</div>
					<div class="col-md-3 col-sm-6 p-3">
						<h4 class="mb-3">Sort Order</h4>
						<input type="number" name="sort_order" value="<?php echo $data['language']->sort_order; ?>">
					</div>
					<div class="col-md-3 col-sm-6 p-3">
						<h4 class="mb-3">Active</h4>
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
