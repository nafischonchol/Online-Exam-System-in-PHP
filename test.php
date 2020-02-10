<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
	$total=$exm->getTotalRows();
	$number;
	if(!empty($_GET['q']))
	{
		$number=(int)$_GET['q'];
	}
	else
	{
		header("Location:exam.php");
	}

	$ques=$exm->getQuestionByNumber($number);
	$ans=$exm->getAnsByNumber($number);	
?>
<?php
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$pro->processData($_POST);
	}
?>

<div class="main">
<h1>Total Question <?php echo $total; ?></h1>
	<div class="test">
		<form method="post" action="">
		<table> 
			<tr>
				<td colspan="2">
				 <h3>Que : <?php echo $ques['ques']; ?></h3>
				</td>
			</tr>

			<?php foreach($ans as $key => $result) { ?>
			<tr>
				<td>
				 <input type="radio" name="ans" value="<?php echo $result['id']?>"/> <?php echo $result['ans'];?> 
				</td>
			</tr>
			<?php } ?> <!--End foreach loop -->

			<tr>
			  <td>
				<input type="submit" name="submit" value="Next Question"/>
				<input type="hidden" name="number" value=<?php  echo $number; ?>/>
			</td>
			</tr>
			
		</table>
		
</div>
 </div>
<?php include 'inc/footer.php'; ?>