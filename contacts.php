<?php
error_reporting(E_ALL); 
ini_set('display_errors','1');
include("includes/db.php");
$status='';
 
 if(isset($_POST['email'])){
  
        //getting the text data from the fields.
		$email = preg_replace('#[^0-9a-zA-Z,.@_)( -]#','',$_POST['email']);
		$name = preg_replace('#[^0-9a-zA-Z,.)( -]#','',$_POST['name']);
		$message = mysqli_real_escape_string($con,$_POST['message']);
	$query = "INSERT INTO contacts(email,name,message)VALUES('$email','$name','$message')";
	 
	 $insert_contact = mysqli_query($con, $query) or die(mysqli_error($con));
 }
?>

<!DOCTYPE html>
<html lang="en">
  

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>Contacts | Sunset Hotel</title>

    <!-- CSS Plugins -->
		<link href="assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css">

    <!-- CSS Global -->
    <!--build:css assets/css/theme.min.css-->
    <link rel="stylesheet" href="assets/css/theme.css">
    <!--endbuild-->

  </head>
  <body id="contacts__page">
		
    <!-- Info Section
    ================================================== -->
    <?php include('template_header.php'); ?> 
    <!-- .section__info -->

  	<!-- Navbar
    ================================================== -->
    <nav class="navbar navbar-default">
      <?php include('header.php'); ?>
      <!-- /.container -->
    </nav>

    <!-- CONTENT
      ================================================== -->

    <!-- section home -->
    <section class="section__home" id="section__home">
    	<div class="container">
    	  <div class="row">
    	    <div class="col-sm-12">
    	    	<div class="welcome__content">
							<h2 class="welcome_content__title">Contact us</h2>
    				</div> <!-- .welcome__content -->
    	    </div>
    	  </div> <!-- / .row -->
    	</div> <!-- / .container -->
			<div class="home__bg"></div>
    </section> <!-- / .section home -->

		<!-- section Contacts -->
    <section class="section__contacts">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h1 class="subheading">If you have any questions don't hesistate to contact us.</h1>        
          </div>
        </div> <!-- / .row -->
      	<div class="row">
      		<div class="col-sm-7">
	        	<div class="section-contacts__form_body">
              <p class="section-contacts__title">Get in touch</p>

              <!-- Alert message -->
              <div class="alert" id="form_message" role="alert"></div>

              <!-- Please carefully read the README file in order to setup the PHP contact form properly -->
              <form class="contacts__form" data-animate-in="animateUp" method="post">
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your E-mail" data-original-title="" title="">
                  <span class="help-block"></span>
                </div>

                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Full Name" data-original-title="" title="">
                  <span class="help-block"></span>
                </div>

                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea name="message" class="form-control" rows="6" id="message" placeholder="Enter Your Message"></textarea>
                  <span class="help-block"></span>
                </div>
                <!-- reCAPTCHA -->
                <div class="form-group" id="form-captcha">
                  <div class="g-recaptcha" data-sitekey="6LcH1RcUAAAAACsvookS7-U-Hx48PioWoSCgsbH6"></div>
                  <span class="help-block"></span>
                </div>
                <!-- /reCAPTCHA -->
                <div class="btn-group">
                  <button type="submit" class="btn">
                    Send Message
                  </button>
                </div>
              </form>
            </div> <!-- / .section-contacts__form_body -->
	        </div>
	        <div class="col-sm-5">
						<div class="contacts__info">
							<p class="contacts_info__title">Information</p>
							<ul class="contacts_info__content">
                <li>
                  <p class="contact-info-text">If you have some questions with booking please contact us.</p>
                </li>
	              <li>
	                <i class="icon ion-android-pin"></i>
	                <div class="contact-info-content">
	                  <div class="title">Address</div>
	                  <div class="description">23, Karimu Kotun Street, Victoria Island, Lagos, Nigeria

</div>
	                </div>
	              </li>
	              <li>
	                <i class="icon ion-android-call"></i>
	                <div class="contact-info-content">
	                  <div class="title">Phone / Fax</div>
	                  <div class="description">09055242894 / 08101869880</div>
	                </div>
	              </li>
	              <li>
	                <i class="icon ion-android-mail"></i>
	                <div class="contact-info-content">
	                  <div class="title">E-mail</div>
	                  <div class="description">liztosin@gmail.com</div>
	                </div>
	              </li>
	            </ul>
						</div> <!-- / .contacts__info -->
	        </div>
	      </div> <!-- / .row -->
      </div> <!-- / .container -->
      <!-- / .section_row -->
    </section> <!-- / .section__contacts -->


		<!-- section footer -->
    <?php include('footer.php'); ?> 
    <!-- .section__footer -->

    <!-- 
    ================================================== -->

    <!-- JS Global -->
    <script src="assets/plugins/jquery/jquery-1.12.4.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src='../../../www.google.com/recaptcha/api.js'></script>

    <!-- JS Plugins -->
		<script src="assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="assets/plugins/contact-form/contact.js"></script>

    <!-- JS Custom -->
    <!--build:js assets/js/theme.min.js -->
    <script src="assets/js/theme.js"></script>
    <!-- endbuild -->
		<script src="assets/js/google_maps.js"></script>

    <!-- Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTGnDWmYKPhKslCvPfkrcZDpgT_QMHT0s&amp;callback=initMap" async defer></script>

  </body>


</html>