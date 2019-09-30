<?php require APPROOT . '/views/inc/header.php'; ?>
	<h1><?php echo $data['title']; ?></h1>
	<ul>
		<?php foreach($data['posts'] as $post) : ?>
			<li><?php echo $post->title; ?></li>
		<?php endforeach; ?>
	</ul>


	<h3><?php echo $data['lang']['main']['models']; ?></h3>

	<h3><?php echo $data['lang']['index']['build_yours']; ?></h3>

	<h3><?php echo $data['lang']['index']['latest_videos']; ?></h3>

	<h3><?php echo $data['lang']['main']['gallery']; ?></h3>


	<h3><?php echo $data['lang']['main']['news']; ?></h3>
	<ul>
		<?php foreach($data['news'] as $news) : ?>
			<li><?php echo $news->title; ?></li>
		<?php endforeach; ?>
	</ul>


<?php require APPROOT . '/views/inc/footer.php'; ?>
