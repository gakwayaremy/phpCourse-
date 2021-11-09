<?php
	session_start();

	include 'connection/dbconnector.php';


	//This code will execute and return data from the database
	//->
	function get_all_students($dba){
		$stmt = $dba->prepare("SELECT * FROM students");
		$stmt->execute();

		//Looping one row after another 
		foreach ($stmt as $row) {
			print_r($row[1]);
			echo "<br>";
		}
	}

	function outline(){
		$stm = $dba->prepare("SELECT * FROM Students");

		$stm->execute();

		foreach ($stm as $row) {
			# code...
		}
	}


	//get a students whose id is 1
	//but dont pass directly the value in the prepare function 
	function get_student_by_id($dba, $stID){
		$stmt2  = $dba->prepare("SELECT * FROM students WHERE id=? OR name LIKE ? OR location LIKE ?");
		$stmt2->execute([$stID, "%".$stID . "%", "%".$stID."%"]);

		//sr - Search Results 
		// foreach ($stmt2 as $row) {
		// 	print($row[1]);

		// }

		//sk - Searched Keyword 
		$_SESSION['sk'] = $stID;

		//sr = Search result
		$_SESSION["sr"] = $stmt2->fetchAll();


	}

	//Inserting of data into database 
	//create a function 
	//give the function three parameters
	//$dba - pdo object | $stName - String user name | $stLocation - String user location 
	function add_new_student($dba, $stName, $stLocation){
		$stmt = $dba->prepare("INSERT INTO students(name, location) VALUE(?,?)");
		$stmt->execute([$stName, $stLocation]);

		if ($stmt) {
			echo "New student is added";
		}
		else{
			echo "Failed to add new student";
		}
	}

	//add_new_student($dba, "Chibade Ndikumana", "Kasungu - Kwamadzi");
	//get_all_students($dba);
	//get_student_by_id($dba, 6);

	if (isset($_POST["ans"])) {
		add_new_student($dba, $_POST["name"], $_POST["location"]);
		header("Location: ".$_SERVER["HTTP_REFERER"]);
	}
	elseif (isset($_POST["sp"])) {
		get_student_by_id($dba, $_POST["search"]);
		header("Location: ". $_SERVER["HTTP_REFERER"]);
	}

?>