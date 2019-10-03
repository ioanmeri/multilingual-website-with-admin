<?php require APPROOT . '/views/inc/header.php'; ?>
	<div class="m-3">
		<a href="<?php echo URLROOT; ?>/texts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>		
		<div class="card card-body bg-light mt-3">
			<h2>Add a Static Text</h2>
			<p>Create a text post with this form</p>
			<form action="<?php echo URLROOT; ?>/texts/add" method="post">
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
					<?php foreach ($data['languages'] as $key => $language): ?>
						<div data-language=<?php echo $language->id; ?> class="<?php echo $key == 0 ? 'active' : ''; ?>">
							<div class="form-group">
								<label for="title_<?php echo $language->code; ?>">Title: <sup>*</sup></label>
								<input type="text" name="title_<?php echo $language->code; ?>" class="form-control form-control-lg <?php echo (!empty($data['title_err'][$language->code])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title'][$language->code]; ?>">
								<span class="invalid-feedback"><?php echo $data['title_err'][$language->code]; ?></span>
							</div>
							<div class="form-group">
								<label for="body_<?php echo $language->code; ?>">Body: <sup>*</sup></label>
								<textarea name="body_<?php echo $language->code; ?>" class="form-control form-control-lg <?php echo (!empty($data['body_err'][$language->code])) ? 'is-invalid' : ''; ?>"><?php echo $data['body'][$language->code]; ?></textarea>
								<span class="invalid-feedback"><?php echo $data['body_err'][$language->code]; ?></span>
							</div>
						</div>
					<?php endforeach ?>	
				</div>
				<input type="submit" class="btn btn-success" value="Submit">
			</form>
		</div>
	</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
