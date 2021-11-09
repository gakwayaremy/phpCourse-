<?php  
	session_start();
	include 'connection/dbconnector.php'; 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Application</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h3>
			Students Registration System
		</h3>

			<ul class="nav nav-tabs" id="myTab" role="tablist">
			  <li class="nav-item " role="presentation">
			    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#dashboard" type="button" role="tab" aria-controls="home" aria-selected="true">Dashboard</button>
			  </li>
			  <li class="nav-item" role="presentation">
			    <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#new_student" type="button" role="tab" aria-controls="profile" aria-selected="false">Add Student</button>
			  </li>
			  <li class="nav-item" role="presentation">
			    <button class="nav-link " id="contact-tab" data-bs-toggle="tab" data-bs-target="#search_student" type="button" role="tab" aria-controls="contact" aria-selected="false">Search Student</button>
			  </li>
			</ul>
			<div class="tab-content" id="myTabContent">

			  <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="home-tab">
			  	<h4>Dashboard</h4>

			  	<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Full Name</th>
      <th scope="col">Location</th>
    </tr>
  </thead>
  <tbody>

  	<?php 
  			$info = $dba->prepare("SELECT * FROM students");
  			$info->execute();
  			foreach ($info as $row) {
  	 ?>
    <tr>
      <th scope="row"> <?php print $row[0]; ?> </th>
      <td><?php print $row[1]; ?></td>
      <td><?php print $row[2]; ?></td>
    </tr>
    <?php 		} ?>
    
  </tbody>
</table>
			  </div>


			  <div class="tab-pane fade " id="new_student" role="tabpanel" aria-labelledby="profile-tab">
			  	<div class="col-6">
				  	<h4>Add New Student</h4>

				  	<form method="POST" action="server.php">
				  		<input type="text" name="name" class="form-control" placeholder="Provide Name">
				  		<input type="text" name="location" class="form-control" placeholder="Provide Location"
				  		<br>
				  		<input type="submit" name="ans" value="Submit" class="btn btn-primary">
				  	</form>
				</div>
			  </div>


			  <div class="tab-pane fade" id="search_student" role="tabpanel" aria-labelledby="contact-tab">
			  	<h4>Search Student from Database</h4>
			  	
			  	<form action="server.php" method="POST">
			  		<input type="text" name="search" placeholder="search for student">
			  		<input type="submit" name="sp" value="Search" class="btn btn-primary">
			  	</form>


			  	<table class="table">
				  	<thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Full Name</th>
					      <th scope="col">Location</th>
					    </tr>
				  	</thead>

				  	<tbody>

				  		<?php 
				  			if (isset($_SESSION["sr"])) {
				  				foreach ($_SESSION["sr"] as $row) {
				  		 ?>
					    <tr>
					      <th scope="row"> <?php print $row[0];  ?> </th>
					      <td> <?php print $row[1];  ?> </td>
					      <td> <?php print $row[2];  ?> </td>
					    </tr>

					    <?php 
					  			}
					  		}
					     ?>
 		 			</tbody>
				</table>
			  </div>
			</div>
		
	</div>
	<script type="text/javascript" src="js/jquery.js" ></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>