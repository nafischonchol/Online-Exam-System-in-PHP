<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
	$total=$exm->getTotalRows();
	
?>


<div class="main">
<h1>All Question & Answer</h1>
	<div class="test">
		<form method="post" action="">
		<table> 
			<?php 
				$getQues=$exm->getQuestionByOrder();
				if($getQues)
				{
					while($ques = $getQues->fetch_assoc()){ ?>

			<tr>
				<td colspan="2">
				 <h3>Que : <?php echo $ques['ques']; ?></h3>
				</td>
			</tr>

			<?php 
				$ans=$exm->getAnsByNumber($ques['quesNo']);	
				foreach($ans as $key => $result) { ?>
			<tr>
				<td>
					 <input type="radio"/> 
					 <?php 
					 	if($result['rightAns']=='1')
					 		echo "<span style='color:blue'>".$result['ans']."</span>";
					 	else
					 		echo $result['ans'];
					 ?> 
				</td>
			</tr>
			<?php } ?> <!--End foreach loop -->

			<?php 	} } ?> <!--End while loop and if  -->
			
		</table>
		
</div>
 </div>
<?php include 'inc/footer.php'; ?>