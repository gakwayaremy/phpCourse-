<?php
	include 'connection/dbconnector.php';


	if ($dba !== null) {
		$stm = $dba->prepare("SELECT * FROM students");
		$stm->execute();

		foreach ($stm as $row) {
			print_r($row["id"]);
			echo "<br>";
		}
	}
?>