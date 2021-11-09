<?php 
	$file = fopen("database.db",'a+');
	
	//fwrite($file,"John Kagaya, jnkag, malawi2021\n");
	//fwrite($file, "Emmanuel Shimiye, eshimiye, malawi2021\n");
	//fwrite($file, "Daniel Saumoni, dansa, malawi2021\n");
	//fwrite($file, "Blessing Chikoti, bchiko, malawi2021\n");
	//fclose($file);
	$f = fgets($file);
	
	fclose($file);
	
	echo $f;
	
?>