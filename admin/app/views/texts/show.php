<?php require APPROOT . '/views/inc/header.php'; ?>
	<?php flash('text_message'); ?>
	<div class="m-3">
		<a href="<?php echo URLROOT; ?>/texts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>		
		<div class="card card-body bg-light mt-3">
			<h2 class="mb-4">Preview Text</h2>
				<ul class="languages d-flex p-0 align-items-center" id="choose-language">
					<?php foreach ($data['languages'] as $key => $language): ?>
					<li class="mr-2 p-1 cur-p 
						<?php echo $key == 0 ? 'active' : ''; ?> 
						<?php echo !(empty($data['title_err'][$language->code]) && empty($data['body_err'][$language->code])) ? 'is-invalid' : ''; ?>"
						data-choose-language=<?php echo $language->id; ?>>
						<?php echo $language->image; ?>	
					</li>
					<?php endforeach ?>
				</ul>
				<div id="languages">
					<?php $c = 0; ?>
					<?php foreach ($data['languages'] as $language) : ?>
						<div data-language=<?php echo $language->id; ?> class="<?php echo $c == 0 ? 'active' : ''; ?>">
							<h4><?php echo $data['text'][$c]->title; ?></h4>
							<p><?php echo $data['text'][$c]->body; ?></p>
						</div>
						<?php $c++; ?>
					<?php endforeach ?>	
				</div>
		</div>
	</div>
	<div class="d-flex justify-content-between">
		<a href="<?php echo URLROOT; ?>/texts/edit/<?php echo $data['text'][0]->texts_id; ?>" class="btn btn-dark ml-3">Edit</a>
		<form action="<?php echo URLROOT; ?>/texts/delete/<?php echo $data['text'][0]->texts_id ?>" method="post">
			<input type="submit" value="Delete" class="btn btn-danger pull-right mr-3">
		</form>
	</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
