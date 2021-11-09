<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Application</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	</head>
	<body>
	
		<div class="container">
			<div class="row">
				<h2>Students Registration System</h2>
			</div>

			<div class="row">

				<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item" role="presentation">
				    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Dashboard</button>
				  </li>

				  <li class="nav-item" role="presentation">
				    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Add Student</button>
				  </li>

				  <li class="nav-item" role="presentation">
				    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Search for Student</button>
				  </li>

				</ul>

				<div class="tab-content" id="myTabContent">
				  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
				  	<h3>Dashboard</h3>
				  	<table class="table">
				  		<thead>
				  			<tr>
				  				<th scope="col">ID</th>
				  				<th scope="col">Full Name</th>
				  				<th scope="col">Location</th>

				  			</tr>
				  		</thead>
				  		<tbody>
				  			<tr>
				  				<th scope="row">1</th>
				  				<td>...</td>
				  				<td>....</td>
				  			</tr>
				  		</tbody>
				  	</table>
				  </div>


				  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				  	<h3>Add New Student</h3>
				  	<div class="d-flex adjust-content-center ">
				  		<div class="col-4">
						  	<form class="form" method="POST" action="server.php">
							  <div class="form-group">
							    <label for="stName">Student Name</label>
							    <input type="text" class="form-control" id="stName" aria-describedby="namehelp">
							  </div>
							  <div class="form-group">
							    <label for="stLocation">Location</label>
							    <input type="text" class="form-control" id="stLocation">
							  </div>
							  <br>
							  <button type="submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
					</div>
				  </div>



				  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
				  	<h3>Search by Name or ID </h3>

				  	<form method="POST" action="server.php">
				  		<table>
				  			<tr>
				  				<td colspan="6">
				  					<input type="text" class="form-control" name="search">
				  				</td>
				  				<td>
				  					<input type="submit" class="btn btn-primary" name="searchTab" value="Submit">
				  				</td>
				  			</tr>
				  		</table>
					    
					  	
					</form>

				  </div>

				  <?php if (isset($_SESSION['adding'])) { ?>
				  	<div class=" fixed-top d-flex justify-content-center">
				  		<?php include 'popup.php'; ?>
				  	</div>
				  <?php }else{ ?>
				  	<?php 
				  		// echo $_SERVER['REQUEST_URI']; 
				  		// echo strpos($_SERVER['REQUEST_URI'], 'return') . "<br>";
				  	?>
				  <?php } session_destroy(); ?>
				
				</div>



			</div>
		</div>


		<script type="text/javascript" src="js/jquery.js" >$('.alert').alert()</script>

		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
			    $('.toast').toast('show');
			});
		</script>
</body>
</html>