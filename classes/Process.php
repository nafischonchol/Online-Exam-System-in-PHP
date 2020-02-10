<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../helpers/Format.php');

	class Process{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db=new Database();
			$this->fm=new Format();
		}
	
		public function getQuestion($number)
		{
			$number=(int)$number;
			$sql="Select ques from tbl_ques where quesNo='$number'";
			$result=$this->db->Select($sql);
			if($result)
			{
				$ques=$result->fetch_assoc();
				return $ques;
				exit();
			}
			else
			{
				echo "Something Wrong...";
				exit();
			}
		}

		public function getAllQuesNo()
		{

			$sql="SELECT `quesNo`FROM `tbl_ques` order by quesNO ASC";
			$result=$this->db->Select($sql);

			$a='';
			if($result)
			{
				while($row = $result->fetch_assoc())
					$a=(string)$a.$row['quesNo'];
				return $a;
				exit();
			}
		}


		public function processData($data)
		{
			$selectedAns=$this->fm->validation($data['ans']);
			$number=$this->fm->validation($data['number']);

			if(!isset($_SESSION['score']))
			{
				$_SESSION['score']=0;
			}
			$rightAns=$this->getRightAns($number);

			if($rightAns==$selectedAns)
			{
				$_SESSION['score']++;
			}

			
			$getLastQuesNo=(int)$this->getLastQuesNo();
			$num=(int)$number;
			if($num==$getLastQuesNo)
			{
				header("Location: final.php");
				exit();
			}
			else
			{
				$next=$this->getNextQues($number);
				header("Location: test.php?q=".$next);
			}


		}//end processData function

		private function getRightAns($number)
		{
			$sql="SELECT id FROM `tbl_ans` WHERE `quesNo`='$number' and rightAns=1";
			$result=$this->db->Select($sql)->fetch_assoc();
			return $result['id'];

		}
		private function getNextQues($number)
		{
			$sql="SELECT quesNo FROM `tbl_ques` WHERE quesNo>'$number'";
			$result=$this->db->Select($sql);
			if($result)
			{
				$result=$result->fetch_assoc();
				return $result['quesNo'];
			}

		}
		private function getLastQuesNo()
		{
			$sql="SELECT max(`quesNo`) as a FROM `tbl_ques`";
			$result=$this->db->Select($sql)->fetch_assoc();
			return $result['a'];
		}
		

	}//end of class Process
?>