<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
	
	$question=$exm->getFirstQuestionNum();
	$total=$exm->getTotalRows();
	/*$imp=$pro->getAllQuesNo();
	
	Session::set('allQuesNo',$imp);*/
?>
<div class="main">

   <h1>Welcome to Online Exam</h1>
   <div class="startnow">
   		<h2>Test your Knowledge</h2>
   		<p>This is multiple choice quize to test your knowledge</p>
   		<p><strong>Number of Question: </strong><?php echo $total; ?></p>
   		<p><strong>Question type:</strong>Multiple Choice</p>
		<ul>
			<li><a href="test.php?q=<?php echo $question['quesNo'];?> ">Start</a></li>
			<!-- <li><a href="test.php">Start</a></li> -->
		</ul>
	</div>

	
</div>
<?php include 'inc/footer.php'; ?>