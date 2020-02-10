<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
?>
<?php
	/*
		$userId=Session::get('userId');
	$getAlldata=$usr->getUserData($userId);
	foreach ($getAlldata as $key => $value) {
		$name=$value['name'];
		Session::set('name',$value['name']);
		$username=$value['username'];
		$email=$value['email'];
	}
	*/

	$name=Session::get("name");
	$username=Session::get('username');
	$email=Session::get("email");
	$userId=Session::get('userId');
?>
<style>
	.profile{width:500px; border:1px solid #ddd; margin:0 auto; padding:30px 80px 80px 50px;}
</style>
<div class="main">
<h1>Online Exam System - User Profile</h1>
	<div class="profile">
		<form action="" method="post">
			<table class="tbl">
				

				<tr>
				   <td>Name</td>
				   <td><input name="name" id="name"  value="<?php echo $name; ?>" type="text"></td>
				 </tr>
				 <tr>
				   <td>Username</td>
				   <td><input name="username" id="username" value="<?php echo $username; ?>" type="text"></td>
				 </tr>    
				 <tr>
				   <td>Email</td>
				   <td><input name="email" id="email" value="<?php echo $email; ?>" type="text"></td>
				 </tr>
				 <tr>
				   <td>Password </td>
				   <td><input name="pass" id="pass" type="password"></td>
				 </tr>
				 <input name="userId" id="userId" value="<?php echo $userId; ?>" type="hidden">
				  <tr>
				  <td></td>
				   <td><input type="submit" name="update" id="update" value="Update">
				   </td>
				 </tr>
				 <tr>
				   <td><span id="mgs"></span></td>
				 </tr>
	       </table>
		</form>
	</div><!--end profile-->
</div><!--end main div-->
<?php include 'inc/footer.php'; ?>