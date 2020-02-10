<?php include 'inc/header.php'; ?>
<?php
	Session::checkLogin();
?>
<div class="main">
<h1>Online Exam System - User Login</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/test.png"/>
	</div>
	<div class="segment">
	<form action="" method="post">
		<table class="tbl">    
			 <tr>
			   <td>Email</td>
			   <td><input name="email" id="email" type="text"></td>
			 </tr>
			 <tr>
			   <td>Password </td>
			   <td><input name="pass" id="pass" type="password"></td>
			 </tr>
			 
			  <tr>
			  <td></td>
			   <td><input type="submit" name="usrLogin" id="login" value="Login">
			   </td>
			 </tr>
       </table>
	   </form>
	   <p>New User ? <a href="register.php">Signup</a> Free</p>
	  <span id="error"></span>

	</div>


	
</div>
<?php include 'inc/footer.php'; ?>