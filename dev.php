<?php

	$f=isPlaindrome("aba");
	if($f==true)
		echo "Plaindrome"."<br>";
	else
		echo "Not Plaindrome"."<br>";

	function isPlaindrome($data)
	{
		
		$f=true;
		$c=strlen($data);

		for($i=0,$j=$c-1;$i<$c;$i++,$j--)
		{
			
				if($data[$i]!=$data[$j])
				{
					return false;
					
				}
				
			
		}
		return true;
	}



?>