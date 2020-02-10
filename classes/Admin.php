<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../helpers/Format.php');

	class Admin{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db=new Database();
			$this->fm=new Format();
		}
		public function getAdminData($data)
		{

			$email=$this->fm->validation($data['email']);
			$pass=$this->fm->validation(md5($data['pass']));
			$query="SELECT * FROM `tbl_admin` WHERE email='$email' AND pass='$pass'";
			$result=$this->db->select($query);
			if($result!=false)
			{

				$value=$result->fetch_assoc();
				//Session::init();
				Session::set('adminLogin','true');
				Session::set('email',$value['email']);
				Session::set('adminId',$value['adminId']);
				/*echo $_SESSION['adminLogin'];
				exit();*/
				header("Location:index.php");

			}
			else
			{
				$msg="<span class='error'>Username or Password is incorrect</span>";
				return $msg;
			}
		}
	}//end of class Admin
?>