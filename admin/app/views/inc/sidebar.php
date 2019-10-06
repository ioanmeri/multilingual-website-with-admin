<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
  <div class="sidebar-heading"><?php echo SITENAME; ?> </div>
  <div class="list-group list-group-flush">
    <a href="<?php echo URLROOT; ?>" class="list-group-item list-group-item-action bg-light">Dashboard</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">Shortcuts</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
    <a href="<?php echo URLROOT; ?>/texts" class="list-group-item list-group-item-action bg-light">Texts</a>
    <a href="<?php echo URLROOT; ?>/languages" class="list-group-item list-group-item-action bg-light"><i class="fa fa-flag mr-2"></i>Languages</a>
    <?php if(isAdmin()) { ?>
    <a href="<?php echo URLROOT; ?>/tables" class="list-group-item list-group-item-action bg-light"><i class="fa fa-table mr-2"></i>Tables</a>
	<?php } ?>
  </div>
</div>
