<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>About Us</title>
	
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="css/bootstrap337/bootstrap.min.css">
	  <script type="text/javascript" src="js/jquery/jquery-3.3.1"></script>
	  <script type="text/javascript" src="js/bootstrap337/bootstrap.min.js"></script>

	  <!-- Custom Fonts -->
    <link href="startbootstrap-grayscale-3.3.7-1/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="startbootstrap-grayscale-3.3.7-1/css/grayscale.min.css" rel="stylesheet">
    <link href="startbootstrap-grayscale-3.3.7-1/css/grayscale.css" rel="stylesheet">

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
			  <a class="navbar-brand" href="index.php">Blue Oasis Private Pool</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="gallery.php">Gallery</a></li>
				<li><a href="amenities.php">Rates and Amenities</a></li>
				<li class="active"><a href="#">About Us<span class="sr-only">(current)</span></a></li>
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
								  <h1 style="color:black;">Sign Up</h1>
								  <p style="color:black;">Please fill out this form to create an account.</p>
								  <hr>
								  <label style="color:black;"><b>First Name</b></label>
									<input style="color:black;" type="text" name="firstName" required>
									<label style="color:black;"><b>Middle Name</b></label>
									<input style="color:black;" type="text" name="middleName">
									<label style="color:black;"><b>Last Name</b></label>
									<input style="color:black;" type="text" name="lastName" required>
									<label style="color:black;"><b>Email Address</b></label>
									<input style="color:black;" type="text" name="email" required>
									<label style="color:black;"><b>Username</b></label>
									<input style="color:black;" type="text" name="username" required>
									<label style="color:black;"><b>Password</b></label>
									<input style="color:black;" type="password" name="password" required>

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
								  <label style="color:black;"><b>Username</b></label>
								  <input style="color:black;" type="text" placeholder="Enter Username" name="login_username" required>
								  <label style="color:black;"><b>Password</b></label>
								  <input style="color:black;" type="password" placeholder="Enter Password" name="login_password" required>
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

		<!-- BODY -->
		 <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1>Blue Oasis Private Pool</h1>
                        <p>is a place for relaxation for those seeking a break in thei﻿r daily routine or simply wanting to have fun on it's crystal clear water. By nightfall let the garden charm you on it's ambiance and allow yourself to invigorate your mind and soul. Enjoy the natural fragrance of fresh Ylang-Ylang and Champaca flowers of our trees. Devote those precious time exclusively reconnecting with those that really matters most.</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
            	<iframe width="330" height="315" src="https://www.youtube.com/embed/07i2NOo8W_I" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            	<iframe width="330" height="315" src="https://www.youtube.com/embed/ZWBiEoMLVVg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>
    </section>

	</body>
</html>