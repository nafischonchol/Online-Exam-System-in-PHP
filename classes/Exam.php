<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../helpers/Format.php');

	class Exam{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db=new Database();
			$this->fm=new Format();
		}
	
		
		public function getAllQues()
		{
			$query="SELECT * FROM `tbl_ques` order by quesNo ASC";
			$result=$this->db->select($query);
			return $result;
		}

		public function delQuestion($quesNo)
		{
			$tables=array('tbl_ques','tbl_ans');
			foreach ($tables as $table)
			{
				$query="DELETE FROM $table WHERE quesNo='$quesNo'";
				$result=$this->db->delete($query);
			}
			if($result)
			{
				$msg="<span class='success'>Question Deleteed Successfully</span>";
				return $msg;
			}
			else
			{
				$msg="<span class='error'>Question Delete Failed</span>";
				return $msg;
			}
		}

		public function getTotalRows()
		{
			$query="SELECT COUNT(ques) as a FROM `tbl_ques`";
			$result=$this->db->select($query);
			if($result)
			{
				$r=$result->fetch_assoc();
				return $r['a'];
			}
			else
			{
				echo "Have problem in getTotalRows Function or don't have data in database";
				exit();
			}
		}

		public function addQuestions($data)
		{
			/*$quesNo=$mysqli->real_escape_string($data['quesNo']);
			$ques=$mysqli->real_escape_string($data['ques']);*/
			$quesNo=(int)$this->getQuesNo()+1;
			//$quesNo=$data['quesNo'];

			$ques=$data['ques'];

			$ans=array();
			$ans['1']=$data['ans1'];
			$ans['2']=$data['ans2'];
			$ans['3']=$data['ans3'];
			$ans['4']=$data['ans4'];
			$rightAns=$data['rightAns'];

			$query="INSERT INTO `tbl_ques`(`quesNo`, `ques`) VALUES ('$quesNo','$ques')";
			$insert_row=$this->db->insert($query);
			//$insert_row=1;
			if($insert_row)
			{
				foreach ($ans as $key=>$as) {
					if($key==$rightAns)
						$query="INSERT INTO `tbl_ans`(`quesNo`, `rightAns`, `ans`) VALUES ('$quesNo','1','$as')";
					else
						$query="INSERT INTO `tbl_ans`(`quesNo`, `rightAns`, `ans`) VALUES ('$quesNo','0','$as')";
					$insertAns=$this->db->insert($query);
					if($insertAns)
						continue;
					else
						die('error...');

				}
				$msg="<span class='success'>Question Added Successfully</span>";
				return $msg;
				
			}
		}//end addQuestions
		private function getQuesNo()
		{
			$sql="SELECT max(quesNo) as a FROM `tbl_ques`";
			$result=$this->db->Select($sql)->fetch_assoc();
			return $result['a'];
		}
		public function getFirstQuestionNum()
		{
			$sql="SELECT * FROM `tbl_ques` order by  quesNO ASC";
			$result=$this->db->select($sql);
			if($result)
			{
				$getData=$result->fetch_assoc();
				return $getData;
				exit();
			}
			else
			{
				echo "Something Wrong....";
				exit();
			}
		}

		public function getQuestionByNumber($number)
		{
			$sql="SELECT * FROM `tbl_ques` where quesNo='$number'";
			$result=$this->db->select($sql);
			if($result)
			{
				$getData=$result->fetch_assoc();
				return $getData;
				exit();
			}
			else
			{
				echo "Something Wrong....";
				exit();
			}
		}

		public function getAnsByNumber($number)
		{
			$sql="SELECT * FROM `tbl_ans` WHERE quesNo='$number'";
			$result=$this->db->select($sql);
			if($result)
			{
				return $result;
				exit();
			}
			else
			{
				echo "Something Wrong....";
				exit();
			}
		}

		public function getQuestionByOrder()
		{
			$sql="SELECT * FROM `tbl_ques` order by quesNo ASC";
			$result=$this->db->select($sql);
			if($result)
			{
				return $result;
				exit();
			}
			else
			{
				echo "Something Wrong....";
				exit();
			}
		}

		

	}//end of class Admin
?>