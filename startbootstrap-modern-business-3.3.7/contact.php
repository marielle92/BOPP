<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap Core CSS -->
    <link href="startbootstrap-modern-business-3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="startbootstrap-modern-business-3.3.7/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="startbootstrap-modern-business-3.3.7/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Page Content -->
    <div class="container">

        <!-- Content Row -->
        <div class="row">
        <!-- Map Column -->
        <!-- GOOGLE MAP --> 
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
