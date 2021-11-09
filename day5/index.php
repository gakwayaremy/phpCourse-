<?php 
	//Connection mySQL database with php  

	$db = null;

	try {
		$db = new PDO("mysql:host=localhost; dbname=phpdatabase", "root", "");
	} catch (Exception $e) {
		echo "Zavuta!!!";
	}


	if ($db !== null) {
		$stm = $db->prepare("SELECT * FROM students");
		$stm->execute();

		foreach ($stm as $row) {
			print_r($row["id"]);
			echo "<br>";
		}
	}
?>