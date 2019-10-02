<?php require APPROOT . '/views/inc/header.php'; ?>
      <div class="container-fluid">
        <h1 class="mt-4">Texts</h1>
        <div class="row">
		<?php foreach($data['texts'] as $text) : ?>
			<div class="col-md-4 card card-body m-3">
				<h4 class="card-title"><?php echo $text->title; ?></h4>
				<div class="bg-light p-2 mb-3">
					
				</div>
				<p class="card-text"><?php echo $text->body; ?></p>
				<a href="<?php echo URLROOT; ?>/posts/show/<?php echo $text->id; ?>" class="btn btn-dark">More</a>
			</div>
		<?php endforeach; ?>
		</div>
      </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
