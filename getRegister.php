<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ('classes/Users.php');
	$usr= new Users();

	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$name=$_POST['name'];
		$username=$_POST['username'];
		$pass=$_POST['pass'];
		$email=$_POST['email'];

		$usrReg=$usr->userRegi($name,$username,$pass,$email);

	}
?>