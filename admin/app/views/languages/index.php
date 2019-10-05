<?php require APPROOT . '/views/inc/header.php'; ?>
	<section class="section-languages pl-3 pr-3">
		<?php flash('text_message'); ?>
	  	<div class="d-flex justify-content-between">
			<h1 class="mt-4 mb-4">Languages</h1>
	  		<a href="<?php echo URLROOT; ?>/languages/add" class="btn btn-primary align-self-center">
				<i class="fa fa-pencil"></i> Add
			</a>
	  	</div>
	  	<div class="">
	  		<p class="mb-2">These are all the available languages the website may have</p>
	  		<div class="alert alert-warning">Active languages appear with a pale flag background</div>
	  	</div> 	
	  	<div class="container-fluid p-0">
	        <div class="row">
			<?php foreach($data['languages'] as $language) : ?>
				<div class="col-md-4">
					<div class="card card-body mb-4 text-center text-capitalize">
						<h4 class="card-title"><?php echo $language->title; ?></h4>
						<div class="<?php echo $language->active ? 'bg-light' : '' ?> p-2 mb-3">
							<?php echo $language->image; ?>
						</div>
						<a href="<?php echo URLROOT; ?>/languages/show/<?php echo $language->id; ?>" class="btn btn-dark">More</a>	
					</div>
				</div>
			<?php endforeach; ?>
			</div>
	  	</div>
	</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>
