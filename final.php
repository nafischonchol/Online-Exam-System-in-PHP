<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
	$question=$exm->getFirstQuestionNum();
	$total=$exm->getTotalRows();
	
?>
<div class="main">

   <h1>You are done!</h1>
   <div class="startnow">
   		
   		<p>You have just complete the test.</p>
   		<p><strong>Final Score: </strong>
   			<?php 
   				echo $_SESSION['score']; 
   				$_SESSION['score']=0;
   			?>
   		</p>
   		
		<ul>
			<li><a href="viewans.php">View Answer</a></li>
			<li><a href="test.php?q=<?php echo $question['quesNo'];?> ">Start Again</a></li>
			
		</ul>
	</div>

	
</div>
<?php include 'inc/footer.php'; ?>