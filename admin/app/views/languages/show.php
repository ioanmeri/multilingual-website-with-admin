<?php require APPROOT . '/views/inc/header.php'; ?>
	<section class="section-languages pl-3 pr-3">
		<?php flash('text_message'); ?>
		<a href="<?php echo URLROOT; ?>/languages" class="btn btn-light mt-3"><i class="fa fa-backward"></i> Back</a>
		<h1 class="mt-4">Language</h1>	
		<h2 class="mt-4 mb-4 text-capitalize"><?php echo $data['language']->title; ?></h2>
		<div class="container-fluid bg-light mb-4">
			<div class="row">
				<div class="col-md-3 col-sm-6 p-3">
					<h4 class="mb-3">Svg icon</h4>
					<p><?php echo $data['language']->image; ?></p>
				</div>
				<div class="col-md-3 col-sm-6 p-3">
					<h4 class="mb-3">Code</h4>
					<p><?php echo $data['language']->code; ?></p>
				</div>
				<div class="col-md-3 col-sm-6 p-3">
					<h4 class="mb-3">Sort Order</h4>
					<p><?php echo $data['language']->sort_order; ?></p>
				</div>
				<div class="col-md-3 col-sm-6 p-3">
					<h4 class="mb-3">Active</h4>
					<div class="">
					<?php if ($data['language']->active) { ?>
						<i class="fa fa-check fa-2x text-success"></i>
					<?php } else { ?>
						<i class="fa fa-close fa-2x text-danger"></i>
					<?php } ?>
					</div>
					
				</div>
			</div>
		</div>
		<div class="d-flex justify-content-between">
			<a href="<?php echo URLROOT; ?>/languages/edit/<?php echo  $data['language']->id; ?>" class="btn btn-dark">Edit</a>
			<form action="<?php echo URLROOT; ?>/languages/delete/<?php echo  $data['language']->id ?>" method="post">
				<input type="submit" value="Delete" class="btn btn-danger pull-right">
			</form>
		</div>
	</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>
