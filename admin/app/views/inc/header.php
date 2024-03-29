<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo SITENAME; ?></title>
  <link href="<?php echo URLROOT; ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo URLROOT; ?>/css/simple-sidebar.css" rel="stylesheet">
  <link href="<?php echo URLROOT; ?>/css/style.css" rel="stylesheet">
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <?php if(isset($data['style'])){ ?>
  <link href="<?php echo URLROOT; ?>/css/<?php echo $data['style']; ?>.css" rel="stylesheet">
  <?php } ?>
</head>
<body>
  <div class="d-flex" id="wrapper">
    <?php require APPROOT . '/views/inc/sidebar.php'; ?>
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <?php require APPROOT . '/views/inc/navbar.php'; ?>
