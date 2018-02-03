<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rates and Amenities</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap337/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/amenities.css" rel="stylesheet">

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
            <li class="active"><a href="#">Rates and Amenities<span class="sr-only">(current)</span></a></li>
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

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Page Heading
                    <small>Secondary Text</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Project One -->
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3>Project One</h3>
                <h4>Subheading</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
                <a class="btn btn-primary" href="#">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project Two -->
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3>Project Two</h3>
                <h4>Subheading</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, odit velit cumque vero doloremque repellendus distinctio maiores rem expedita a nam vitae modi quidem similique ducimus! Velit, esse totam tempore.</p>
                <a class="btn btn-primary" href="#">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project Three -->
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3>Project Three</h3>
                <h4>Subheading</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, temporibus, dolores, at, praesentium ut unde repudiandae voluptatum sit ab debitis suscipit fugiat natus velit excepturi amet commodi deleniti alias possimus!</p>
                <a class="btn btn-primary" href="#">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project Four -->
        <div class="row">

            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3>Project Four</h3>
                <h4>Subheading</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, quidem, consectetur, officia rem officiis illum aliquam perspiciatis aspernatur quod modi hic nemo qui soluta aut eius fugit quam in suscipit?</p>
                <a class="btn btn-primary" href="#">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project Five -->
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3>Project Five</h3>
                <h4>Subheading</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, quo, minima, inventore voluptatum saepe quos nostrum provident ex quisquam hic odio repellendus atque porro distinctio quae id laboriosam facilis dolorum.</p>
                <a class="btn btn-primary" href="#">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-3.2.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap337/bootstrap.min.js"></script>

</body>

</html>
