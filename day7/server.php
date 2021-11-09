<?php 
	session_start();

	header("Location: ".$_SERVER["HTTP_REFERER"]);

	//Session Handlingn
	$_SESSION['adding'] = "yes";
	$_SESSION['toastTitle'] = "Adding Process";
	$_SESSION['toastMessage'] = "New student is added successful";
	//echo "<script> alert(\"Added Successful\") </script>";

	if (isset($_POST["ans"])) {

		add_new_student($dba,$_POST["name"],$_POST["location"] );
		header("Location: ".$_SERVER["HTTP_REFERER"]."#new_student");
	}


 ?>