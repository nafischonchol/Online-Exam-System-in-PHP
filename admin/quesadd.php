<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');
	$xm=new Exam();
?>
<?php
  // Session::checkLogin();
?>
<style>
	.questionAdd{width:480px;color:#999; margin:20px auto; padding: 10px; border:1px solid #ddd;}
</style>
<?php
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$add=$xm->addQuestions($_POST);
	}
	$total=$xm->getTotalRows();
	$next=$total+1;
?>

<div class="main">
<h1>Admin Panel- Add Question</h1>
	<?php
		if(isset($add))
			echo $add;
	?>
	<div class="questionAdd">
		<form action="" method="post">
			<table >
				<tr>
					<td>Question No</td>
					<td>:</td>
					<td><input type="number" name="quesNo" value=<?php if(isset($next)) echo $next; ?> > </td>
				</tr>
				<tr>
					<td>Question</td>
					<td>:</td>
					<td><input type="text" name="ques" placeholder="Eneter your question..." required> </td>
				</tr>
				<tr>
					<td>Choice One</td>
					<td>:</td>
					<td><input type="text" name="ans1" placeholder="Eneter Choice One..." required > </td>
				</tr>
				<tr>
					<td>Choice Two</td>
					<td>:</td>
					<td><input type="text" name="ans2" placeholder="Eneter Choice Two..." required> </td>
				</tr>
				<tr>
					<td>Choice Three</td>
					<td>:</td>
					<td><input type="text" name="ans3" placeholder="Eneter Choice Three..." re Threequired> </td>
				</tr>
				<tr>
					<td>Choice Four</td>
					<td>:</td>
					<td><input type="text" name="ans4" placeholder="Eneter Choice Four..." required> </td>
				</tr>
				<tr>
					<td>Correct No</td>
					<td>:</td>
					<td><input type="number" name="rightAns" required> </td>
				</tr>
				<tr>
					
					<td colspan="3" align='center'><input type="submit" value="Add A Question" > </td>
				</tr>
			</table>
		</form>
	</div>


	
</div><!--main div end-->
<?php include 'inc/footer.php'; ?> 

