<?php require APPROOT . '/views/inc/header.php'; ?>
<h1><?php echo $data['lang']['main']['news']; ?></h1>

	<ul>
		<?php foreach($data['news'] as $news) : ?>
			<li>
				<h4><?php echo $news->title; ?></h4>
				<?php echo $news->date_added; ?>
			</li>
		<?php endforeach; ?>
	</ul>

<?php require APPROOT . '/views/inc/footer.php'; ?>
