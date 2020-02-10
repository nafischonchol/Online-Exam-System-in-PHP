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
		$userId=$_POST['userId'];

		$usrReg=$usr->updateUser($name,$username,$pass,$email,$userId);

	}
?>