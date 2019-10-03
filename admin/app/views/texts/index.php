<?php require APPROOT . '/views/inc/header.php'; ?>
  	<div class="d-flex justify-content-between ml-3 mr-3">
		<h1 class="mt-4">Texts</h1>
  		<a href="<?php echo URLROOT; ?>/texts/add" class="btn btn-primary align-self-center">
			<i class="fa fa-pencil"></i> Add
		</a>
  	</div>
  	<div class="container-fluid">
        <div class="row">
		<?php foreach($data['texts'] as $text) : ?>
			<div class="col-md-4">
				<div class="card card-body mb-4">
					<h4 class="card-title"><?php echo $text->title; ?></h4>
					<div class="bg-light p-2 mb-3">
						
					</div>
					<p class="card-text"><?php echo $text->body; ?></p>
					<a href="<?php echo URLROOT; ?>/texts/show/<?php echo $text->textId; ?>" class="btn btn-dark">More</a>	
				</div>
			</div>
		<?php endforeach; ?>
		</div>
  	</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
