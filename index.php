<?php
	session_unset();
	
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Home</title>

		<meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="description" content="">
	  <meta name="author" content="">

	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



	</head>
	<body>
	
		<!-- NAVBAR FIXED TOP RESPONSIVE -->
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="#">Blue Oasis Private Pool</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav">
					<li class="active"><a href="#">Home<span class="sr-only">(current)</span></a></li>
					<li><a href="gallery.php">Gallery</a></li>
					<li><a href="amenities.php">Rates and Amenities</a></li>
					<li><a href="about_us.php">About Us</a></li>
					<li><a href="contact_us.php">Contact Us</a></li>
			  </ul>

			  
			  <div>
				  <ul class="nav navbar-nav navbar-right">
					<!-- SIGNUP BUTTON AND MODAL RESPONSIVE -->  	
						<li>
							<link rel="stylesheet" href="css/signup.css">
							<button class="btn btn-default" onclick="document.getElementById('signup').style.display='block'" style="width:auto; margin-left:10px;">Sign Up</button>

							<div id="signup" class="modal">

							  <span onclick="document.getElementById('signup').style.display='none'" class="close" title="Close Modal">&times;</span>
							  <form class="modal-content" method="post" action="signup_redirect.php">
								<div class="container-fluid">
								  <h1>Sign Up</h1>
								  <p>Please fill out this form to create an account.</p>
								  <hr>
								  	<label><b>First Name</b></label>
									<input type="text" name="firstName" required>
									<label><b>Middle Name</b></label>
									<input type="text" name="middleName" required>
									<label><b>Last Name</b></label>
									<input type="text" name="lastName" required>
									<label><b>Email Address</b></label>
									<input type="email" name="email" required>
									<label><b>Username</b></label>
									<input type="text" name="username" required>
									<label><b>Password</b></label>
									<input type="password" name="password" required>

								  <div class="clearfix">
									<button type="button" class="btn btn-danger" onclick="document.getElementById('signup').style.display='none'" class="cancelbtn">Cancel</button>
									<button type="submit" class="signupbtn btn btn-success" style="width: auto; margin-right:10px;">Sign Up</button>
								  </div><br>
								</div>
							  </form>
							</div>

							<script>
							// Get the modal
							var modal1 = document.getElementById('#signup');

							// When the user clicks anywhere outside of the modal, close it
							window.onclick = function(event) {
								if (event.target == modal1) {
									modal1.style.display = "none";
								}
							}
							</script>

						</li>
						<!-- LOGIN BUTTON AND MODAL RESPONSIVE -->
					<li>
						<link rel="stylesheet" href="css/login.css">

							<button type="button" class="btn btn-primary" onclick="document.getElementById('id01').style.display='block'" style="width:auto; margin-left: 10px">Log In</button>
							<div id="id01" class="modal">  
							  <form class="modal-content animate" action="login_redirect.php" method="post">
								<div class="container-fluid" style="padding-top: 10px; padding-bottom: 10px;">
								  <label><b>Username</b></label>
								  <input type="text" placeholder="Enter Username" name="login_username" required>
								  <label><b>Password</b></label>
								  <input type="password" placeholder="Enter Password" name="login_password" required>
								  <button type="submit" class="btn btn-primary" style="width: auto;">Log In</button>
								  <a href="forgot_password.php">
						          	<button type="button" class="btn btn-warning" role="button">Forgot Password</button>
						          </a>
								</div>
							  </form>
							</div>
							<script>
							  var modal = document.getElementById('id01');
							  window.onclick = function(event) {
								  if (event.target == modal) {
									  modal.style.display = "none";
								  }
							  }
							</script>
					</li>
				  </ul>
				</div>
		  </div>
		</nav>

		<!-- CAROUSEL -->
		<div class="container">
		  <div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
			  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			  <li data-target="#myCarousel" data-slide-to="1"></li>
			  <li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">

			  <div class="item active">
				<img src="images/home1.JPG" style="width:100%;">
				<div class="carousel-caption">
				  <h3>Blue Oasis</h3>
				  <p>Clear blue waters</p>
				</div>
			  </div>

			  <div class="item">
				<img src="images/home2.JPG" style="width:100%;">
				<div class="carousel-caption">
				  <h3>Blue Oasis</h3>
				  <p>Modern style</p>
				</div>
			  </div>
			
			  <div class="item">
				<img src="images/home3.JPG" style="width:100%;">
				<div class="carousel-caption">
				  <h3>Blue Oasis</h3>
				  <p>Garden setting</p>
				</div>
			  </div>
		  
			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			  <span class="glyphicon glyphicon-chevron-left"></span>
			  <span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
			  <span class="glyphicon glyphicon-chevron-right"></span>
			  <span class="sr-only">Next</span>
			</a>
		  </div>
		</div>
		<!-- REVIEWS -->
		<div class="container">
		<h1 align="center">FEEDBACK</h1>
	    <table class="table table-condensed" id="dataTable" cellspacing="0">
	      <tbody>
	      <?php
	      	require 'connection.php';
	          $feedbackQuery = mysqli_query($cn, "SELECT * FROM tbl_feedback WHERE mgr_evaluation='Approved'");
	          while ($feedbackResult = mysqli_fetch_array($feedbackQuery)) {
	          	$userId = $feedbackResult["user_id"];
	          	$userQuery = mysqli_query($cn, "SELECT * FROM tbl_user WHERE id='$userId'"); 
	          		while ($userResult = mysqli_fetch_array($userQuery)) {
	          			$firstName = $userResult["firstName"];
	          			$lastName = $userResult["lastName"];
	          		}

	            echo '
	              <tr>
		              <td>
		              	<img src="uploads/' . $feedbackResult["image"] .'" height="100" width="100">   	
		              </td>
		              <td>
		              <b>'. $firstName . ' ' . $lastName . '</b><br>'
		              	. $feedbackResult["rating"] . ' Stars <br>'
		              	. $feedbackResult["review"] . '
		         				
		              </td>
	              </tr>
	            ';
	          }
	        ?>
	      </tbody>
	    </table>
  	</div>
        

	</body>
</html>