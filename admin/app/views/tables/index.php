<?php require APPROOT . '/views/inc/header.php'; ?>
<section class="section-tables m-3">
	<a href="<?php echo URLROOT; ?>" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
	<?php flash('text_message'); ?>
  	<div class="d-flex justify-content-between">
		<h1 class="mt-4">Tables</h1>
  		<a href="<?php echo URLROOT; ?>/texts/add" class="btn btn-primary align-self-center">
			<i class="fa fa-pencil"></i> Add
		</a>
  	</div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>
