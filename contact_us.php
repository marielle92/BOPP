<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Home</title>
	
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="css/bootstrap337/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="js/bootstrap337/bootstrap.min.js"></script>

	  <!-- CONTACT FORM -->
    <!-- Custom CSS -->
    <link href="startbootstrap-modern-business-3.3.7/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="startbootstrap-modern-business-3.3.7/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
		        <li><a href="about_us.php">About Us</a></li>
		        <li class="active"><a href="#">Contact Us<span class="sr-only">(current)</span></a></li>
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
			      				<input type="text" name="middleName">
			      				<label><b>Last Name</b></label>
			      				<input type="text" name="lastName" required>
			      				<label><b>Email Address</b></label>
			      				<input type="text" name="email" required>
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

		<!-- CONTACT FORM -->
		<!-- Page Content -->
    <div class="container">

        <!-- Content Row -->
        <div class="row">
        <!-- Map Column -->
        <!-- GOOGLE MAP --> 
        	<div class="col-md-8">
	          <div id="map" style="height:500px;background:yellow;"></div>

	          <script>
	          function myMap() {
	            var location = {lat:14.7015331, lng: 120.97776870000007};
	            var map = new google.maps.Map(document.getElementById("map"), {
	              zoom: 16,
	              center: location
	            });
	            var marker = new google.maps.Marker({position:location});
	            marker.setMap(map);
	          }
	          </script>
	        </div>
	          <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6ltIOsYrWfXY-O24ZFPDaiZujgX8Om48&callback=myMap"></script>

            <!-- Contact Details Column -->
            <div class="col-md-4">
                <h3>Contact Details</h3>
                <p>
                    Ilang Ilang St. cor Serrano St.,
                    <br>103 Interior, Purok 11,
                    <br>Brgy. Maysan, Valenzuela City,
                    <br>NCR, Philippines
                    <br>
                </p>
                <p><i class="fa fa-phone"></i> 
                    Landline: (02) 985-2052
                </p>
                <p><i class="fa fa-phone"></i> 
                    Phone: (+632) 933-987-6515
                </p>
                <p><i class="fa fa-envelope-o"></i> 
                    <a href="mailto:blueoasis.dev@gmail.com">blueoasis.dev@gmail.com</a>
                </p>
                <ul class="list-unstyled list-inline list-social-icons">
                    <li>
                        <a href="https://m.facebook.com/profile.php?id=246386795504183"><i class="fa fa-facebook-square fa-2x"></i> Blue Oasis Resort</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="row">
            <div class="col-md-8">
                <h3>Send us a Message</h3>
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Full Name:</label>
                            <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Phone Number:</label>
                            <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Email Address:</label>
                            <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Message:</label>
                            <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>

        </div>
        <!-- /.row -->

        <hr>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="startbootstrap-modern-business-3.3.7/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="startbootstrap-modern-business-3.3.7/js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="startbootstrap-modern-business-3.3.7/js/jqBootstrapValidation.js"></script>
    <script src="startbootstrap-modern-business-3.3.7/js/contact_me.js"></script>
		
	</body>
</html>