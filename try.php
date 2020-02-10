<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
	$quesNo;
	$imp;
	if(isset($_GET['q']))
	{
		$quesNo= $_GET['q'];
		$ques=$pro->getQuestion($quesNo);

		$imp=$pro->getAllQuesNo();
		$next=Session::get('next');
		echo $next;
		exit();
		$total=$exm->getTotalRows();	

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

			<tr>
				<td>
				 <input type="radio" name="ans"/>Load
				</td>
			</tr>
			<tr>
				<td> 
				<input type="radio" name="ans"/>GotFocus
				</td>
			</tr>
			<tr>
				<td>
					<input type="radio" name="ans"/>Instance
				</td>
			</tr>
			<tr>
				<td>
					<input type="radio" name="ans"/>Initialize
				</td>
			</tr>

			<tr>
			  <td>
				<input type="submit" name="submit" value="Next Question"/>
				<input type="hidden" name="number"/>
			</td>
			</tr>
			
		</table>
</div>
 </div>
<?php include 'inc/footer.php'; ?>