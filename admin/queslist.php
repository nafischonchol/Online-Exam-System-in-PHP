<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');
	$xm=new Exam();
?>
<?php
  if(isset($_GET['del']))
  {
  	$quesNo=$_GET['del'];
  	$delQues=$xm->delQuestion($quesNo);
  }
?>

<div class="main">
	<h1>Admin Panel- Question List</h1>
	<?php
		if(isset($delQues))
		{
			echo $delQues;
		}
	?>
	<div class='questionList'>
		<table class="tblone">
			<tr>
				<th width="10%">No</th>
				<th width="60%">Question</th>
				<th width="30%">Action</th>
			</tr>
			<?php
				$ques=$xm->getAllQues();
				if($ques)
				{
					$i=0;
					foreach ($ques as $data) {
						$i++;
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $data['ques'] ;?></td>
				<td>
					<a onclick="return confirm('Are You Sure To Remove') " href="?del=<?php echo $data['quesNo'] ; ?>">Remove</a>
				</td>
			</tr>
			<?php 	} } ?>
		</table>
	</div>


	
</div><!--main div end-->
<?php include 'inc/footer.php'; ?> 

