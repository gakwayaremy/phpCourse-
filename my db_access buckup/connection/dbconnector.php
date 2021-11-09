<?php
	//This is a variable to initialize the PDO
	$dba = null;

	try {
		$dba = new PDO("mysql:host=localhost;dbname=phpdatabase","root","");
	} catch (Exception $e) {
		print_r($e->getMessage());
	}


?>