<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../helpers/Format.php');

	class Users{
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
			
		}
		public function getAllUser()
		{
			$query="SELECT * FROM `tbl_user` order by userId DESC";
			$result=$this->db->select($query);
			return $result;
		}

		public function disbaleUser($userId)
		{
			$query="UPDATE `tbl_user` SET status=1 WHERE userId='$userId'";
			$result=$this->db->update($query);
			if($result)
			{
				$msg="<span class='success'>User Disabled</span>";
				return $msg;
			}
			else
			{
				$msg="<span class='error'>Not Disable</span>";
				return $msg;
			}
		}

		public function enableUser($userId)
		{
			$query="UPDATE `tbl_user` SET status=0 WHERE userId='$userId'";
			$result=$this->db->update($query);
			if($result)
			{
				$msg="<span class='success'>User Enable</span>";
				return $msg;
			}
			else
			{
				$msg="<span class='error'>Not Enable</span>";
				return $msg;
			}
		}
		public function deleteUser($userId)
		{
			$query="DELETE FROM `tbl_user` WHERE userId='$userId'";
			$result=$this->db->delete($query);
			if($result)
			{
				$msg="<span class='success'>User Remove Successfully !</span>";
				return $msg;
			}
			else
			{
				$msg="<span class='error'>Not Remove !</span>";
				return $msg;
			}
		}

		public function userRegi($name,$username,$pass,$email)
		{
			$name=$this->fm->validation($name);
			$username=$this->fm->validation($username);
			$pass=$this->fm->validation($pass);
			$email=$this->fm->validation($email);
			if($name=='' || $username=='' || $pass=='' || $email=='')
			{
				echo "<span class='error'>Fileds must not be empty</span>";
				exit();
			}
			else if(filter_var($email,FILTER_VALIDATE_EMAIL) === false)
			{
				echo "<span class='error'>Invalid Email Address !</span>";
				exit();
			}
			else
			{
				$checkEmail="SELECT email FROM `tbl_user` where email='$email'";
				$res=$this->db->select($checkEmail);
				if($res != false)
				{
					echo "<span class='error'>Email Address Already Exist !</span>";
					exit();
				}
				else
				{
					$query="INSERT INTO `tbl_user`(`name`, `username`, `email`, `pass`) 
						VALUES ('$name','$username','$email','$pass')";
					$result=$this->db->insert($query);
					if($result)
					{
						echo "<span class='success'>User Registration Successfully !</span>";
						exit();
					}
					else
					{
						echo "<span class='error'>Error.... !</span>";
						exit();
					}
				}
			}
		}//end of usrRegi function


		public function userLogin($pass,$email)
		{

			$pass=$this->fm->validation($pass);
			$email=$this->fm->validation($email);
			if($pass=='' || $email=='')
			{
				echo "<span class='error'>Fileds Should not be empty</span>";
				exit();
			}
			else if(filter_var($email,FILTER_VALIDATE_EMAIL) === false)
			{
				echo "<span class='error'>Invalid Email Address !</span>";
				exit();
			}
			else
			{
				$check="SELECT * FROM `tbl_user` where email='$email' AND pass='$pass' ";

				$result=$this->db->select($check);
				
				if($result)
				{
					$value=$result->fetch_assoc();
					if($value['status']==1)
					{
						echo "<span class='error'>You are in disable mode, contact to admin !</span>";
						exit();
					}

					else
					{
						echo "ok";
						Session::init();
						Session::set('login','true');
						Session::set('email',$value['email']);
						Session::set('userId',$value['userId']);
						Session::set('name',$value['name']);
						Session::set('username',$value['username']);
						exit();
					}
				}
				else
				{
					echo "<span class='error'>Email or Password Incorrect !</span>";
					exit();
				}
			}
		}//end of userLogin fucniton

		public function updateUser($name,$username,$pass,$email,$userId)
		{
			$name=$this->fm->validation($name);
			$username=$this->fm->validation($username);
			$pass=$this->fm->validation($pass);
			$email=$this->fm->validation($email);
			$userId=$this->fm->validation($userId);
			if($name=='' || $username=='' || $pass=='' || $email=='')
			{
				echo "<span class='error'>Fileds must not be empty !</span>";
				exit();
			}
			else if(filter_var($email,FILTER_VALIDATE_EMAIL) === false)
			{
				echo "<span class='error'>Invalid Email Address !</span>";
				exit();
			}
			else
			{
			
				$query="UPDATE `tbl_user` SET `name`='$name',`username`='$username',`email`='$email',`pass`='$pass' WHERE userId='$userId'";
				$result=$this->db->update($query);
				if($result)
				{
					Session::init();
					Session::set('email',$email);
					Session::set('userId',$userId);
					Session::set('name',$name);
					Session::set('username',$username);
					
					echo "<span class='success'>Profile Update Successfully </span>";
					exit();
				}
				else
				{
					echo "<span class='error'>Error.... !</span>";
					exit();
				}
			
			}
		}//end of update User Funciton

		/*public function getUserData($userId)
		{
			$sql="select * from tbl_user where userId='$userId'";
			$result=$this->db->select($sql);
			if($result)
				return $result;
			else
			{
				echo "Something Wrong..";
				exit();
			}
		}*/



	}//end of class Admin
?>