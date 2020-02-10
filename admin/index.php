<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
?>
<?php
  // Session::checkLogin();
?>
<style>
	.adminpanel{width:500px;color:#999; margin:30px auto; padding: 50px; border:1px solid #ddd;}
</style>
<div class="main">
<h1>Admin Panel</h1>
	<div class="adminpanel">
		<h2>Welcome to control Admin Panel</h2>
		<p>You can manage your user and online exam system from here...</p>
	</div>


	
</div><!--main div end-->
<?php include 'inc/footer.php'; ?> 

