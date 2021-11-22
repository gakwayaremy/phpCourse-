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

		if ($stmt->rowCount() > 0) {
			$_SESSION['Notification'] =  "New student is added Successful";
		}
		else{
			$_SESSION["Notification"] = "Failed to add new student: Verify if is not repeated data.";
		}
	}


	function add_new_stream($dba, $strName, $strDesc){
		
		$stm = $dba->prepare("INSERT INTO stream(s_name, s_description) VALUE(?,?)");
		$stm->execute([$strName, $strDesc]);

		if ($stm->rowCount() > 0) {
			$_SESSION["Notification"] = "New Stream is created Successful";
		}else{
			$_SESSION["Notification"] = "Failed to create new stream. Verify if it does not exist already in the system";
		}
	}


	function enroll_new_student($dba, $stID, $streamID, $denrolled){
		$enow = $dba->prepare("INSERT INTO enrolment(e_student_id, e_stream_id, e_year_enrolled) VALUES (?, ?, ?)");

		$enow->execute([$stID, $streamID, $denrolled]);

		if ($enow->rowCount() > 0) {
			$_SESSION["Notification"] = "Student Accepted";
		}else{
			$_SESSION["Notification"] = "Student is already enrolled in this stream!";
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
	elseif(isset($_POST["astd"])){
		add_new_stream($dba, $_POST["stm_name"], $_POST["stm_descr"]);
		header("Location: " . $_SERVER["HTTP_REFERER"]);
	}

	elseif (isset($_POST["esn"])) {
		enroll_new_student($dba, $_POST["stID"], $_POST["strmID"], $_POST["dateEnrolled"]);
		header("Location: ". $_SERVER["HTTP_REFERER"]);
	}

?>