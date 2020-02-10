<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Users.php');
	$usr=new Users();
?>
<?php
  if(isset($_GET['dis']))
  {
  	$dblid=(int)$_GET['dis'];
  	$dbluser=$usr->disbaleUser($dblid);
  }
  if(isset($_GET['ena']))
  {
  	$eblid=(int)$_GET['ena'];
  	$ebluser=$usr->enableUser($eblid);
  }
  if(isset($_GET['del']))
  {
  	$delid=(int)$_GET['del'];
  	$deluser=$usr->deleteUser($delid);
  }
?>

<div class="main">
	<h1>Admin Panel- Manage Users</h1>
	<?php
		if(isset($ebluser))
			echo $ebluser;
		if(isset($dbluser))
			echo $dbluser;
		if(isset($deluser))
			echo $deluser;
	?>
	<div class='mangeUsers'>
		<table class="tblone">
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
			<?php
				$userdata=$usr->getAllUser();
				if($userdata)
				{
					$i=0;
					foreach ($userdata as $data) {
						$i++;
				
			?>
			<tr>
				<td>
					<?php 
						if($data['status']==1)
						{
							echo '<span class="error">'.$i;'</span>';
						}
						else
							echo $i;
					?>
						
				</td>
				<td><?php echo $data['name'] ;?></td>
				<td><?php echo $data['username'] ;?></td>
				<td><?php echo $data['email'] ;?></td>
				<td>
					<?php if($data['status']=='0'){ ?>
							<a onclick="return confirm('Are You Sure To Disable') " href="?dis=<?php echo $data['userId'] ; ?>">Disable</a>
					<?php }else{ ?>
						<a onclick="return confirm('Are You Sure To Enable') " href="?ena=<?php echo $data['userId'] ; ?>">Enable</a>
					<?php }?> 
					 ||
					<a onclick="return confirm('Are You Sure To Remove') " href="?del=<?php echo $data['userId'] ; ?>">Remove</a>
				</td>
			</tr>
			<?php 	} } ?>
		</table>
	</div>


	
</div><!--main div end-->
<?php include 'inc/footer.php'; ?> 

