<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ('classes/Users.php');
	$usr= new Users();

	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		
		$pass=$_POST['pass'];
		$email=$_POST['email'];

		$usrLog=$usr->userLogin($pass,$email);


	}
?>