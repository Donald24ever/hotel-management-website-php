<?php
include_once('includes/login_check.php');

if(isset($_GET['id'])) {
			 $roomID = $_GET['id'];
$sql = "SELECT id,title,details,category_id,image,price FROM rooms WHERE id='$roomID' LIMIT 1";
$query = mysqli_query($con, $sql) or die(mysqli_error($con));
while ($row=mysqli_fetch_array($query)){
	    $roomID = $row[0];
		$roomTitle = $row[1];
		$roomDetails = $row[2];
		$roomCategory = $row[3];
		$roomImage = $row[4];
		$roomPrice = $row[5];
}
 }


$roomList ='';
$sql = "SELECT id,title,details,category_id,image,price FROM rooms ORDER BY RAND() LIMIT 4";
$query = mysqli_query($con, $sql) or die(mysqli_error($con));
while ($row=mysqli_fetch_array($query)){
	    $roomID = $row[0];
		$roomTitle = $row[1];
		$roomDetails = $row[2];
		$roomCategory = $row[3];
		$roomImage = $row[4];
		$roomPrice = $row[5];
		
		$roomList .='<div class="col-sm-6">
		    	  	<figure class="best-rooms__item">
	    	  			<img src="admin/room_images/'.$roomImage.'" class="img-responsive" width="555px" height="312px" alt="...">
								<figcaption>
									<h3>'.$roomTitle.' ('.$roomCategory.')</h3>
									<div class="item__price">
										N'.number_format($roomPrice).' <small>/ night</small>
									</div>
									<p class="item__desc">'.$roomDetails.'</p>
									<a href="reservation.php?room='.$roomID.'" class="btn-book">Book now <i class="icon ion-chevron-right"></i><i class="icon ion-chevron-right"></i></a>
								</figcaption>
					</figure> <!-- / .best-rooms__item -->
		    	  </div>';
		
    }	
					
					
?>

<!DOCTYPE html>
<html lang="en">
  

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>Sunset Hotel | Hotel Premium HTML Template</title>

    <!-- CSS Plugins -->
    <link href="assets/plugins/lightbox/dist/css/lightbox.css" rel="stylesheet">
		<link href="assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="assets/plugins/owl-carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/plugins/owl-carousel/dist/assets/owl.theme.default.min.css">

    <!-- CSS Global -->
    <!--build:css assets/css/theme.min.css-->
    <link rel="stylesheet" href="assets/css/theme.css">
    <!--endbuild-->

  </head>
  <body id="index__page">
		
		<!-- Info Section
    ================================================== -->
		<?php include('template_header.php'); ?> <!-- .section__info -->

  	<!-- Navbar
    ================================================== -->
    <nav class="navbar navbar-default">
      <?php include('admin_header.php'); ?>
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
							<h1 class="welcome_content__title">Sunset Hotel</h1>
							<p class="welcome_content__title-primary">grand</p>
	  					<p class="welcome_content__desc">Enjoy your life with us</p>
	  					<a href="#section__about" class="btn btn-reservation">Explore it</a>
		  			</div> <!-- .welcome__content -->
    	    </div>
	    	</div> <!-- / .row -->
    	</div> <!-- / .container -->
			<div class="home__bg"></div>
    </section> <!-- / .section__home -->

    <!-- section availability -->
	<section class="section__availability"> 
		<div class="container"> 
			<div class="row"> 
				<div class="col-sm-12"> 

					<!-- Reservation form --> 
					<form class="reservation__form"> 
						<div class="form-group">
							<div class="form-group__inner"> 
								<label for="reservation__check-in">Arrival date</label>
								<input type="text" class="form-control date" id="reservation__check-in" value="13 october 2017"> 
							</div> <!-- / .form-group__inner --> 
						</div> <!-- / .form-group --> 
						<div class="form-group"> 
							<div class="form-group__inner"> 
								<label for="reservation__check-out">Departure date</label>
								<input type="text" class="form-control date" id="reservation__check-out" value="13 october 2017">
							</div> <!-- / .form-group__inner --> 
						</div> <!-- / .form-group -->  
					</form> <!-- / .reservation__form --> 

				</div> 
			</div> <!-- / .row -->
			<div class="row"> 
				<div class="col-xs-12">

					<!-- Reservation button --> 
					<div class="reservation__button">
						<a href="rooms.php" class="btn btn-reservation">Check availability</a>
					</div> <!-- / .reservation__button -->  
					
				</div> 
			</div> <!-- / .row -->  
		</div> <!-- / .container --> 
	</section> <!-- .section__availability -->
	   
	<!-- section about -->
    <section class="section__about" id="section__about">
    	<div class="container">
    		<div class="row">
    			<div class="col-sm-12"> 		  	
    				<h2 class="section__title">Welcome to <strong>Sunset Hotel</strong></h2>
    				<div class="divider">
    					<hr class="line1">
    					<hr class="line2">
    					<hr class="line1">
    				</div> <!-- / .divider -->
    			</div>
    		</div> <!-- / .row -->
    	</div> <!-- / .container -->
    	<div class="container-fluid">
    		<div class="row">
		    	<div class="section_about__content">
		    	  <div class="col-md-6">
		    	  	<div class="about__pic">
		    				<img src="assets/img/about_img.jpg" class="img-responsive" alt="...">
		    			</div> <!-- / .about__pic -->
		    	  </div>
		    	  <div class="col-md-6">
			    	  <div class="about__desc">
			    	  	<p class="about_desc__subtitle">About us</p>
			  				<h3 class="about_desc__title">The best place to enjoy your life</h3>
								<p class="about_desc__desc">Convieniently located in the heart of Victoria Island, Sunset Hotel introduces the world to you. A showcase of forward thinking and bold design. One of the modern hotels in Lagos. Constantly changing, endlessly fascinating. The lobby vibe is orchestrated to make full use of the dramatic public spaces of Diamond Hotel, fully synced with the rhythm of the moment. Wether you are in the mood to shop or just stroll through the lively neighbourhood, everything is easy within reach. Our services are open to you 24/7</br>We are totally committed to rendering the best service to the public and tourists, as part of our contribution to the development of tourism and the hospitality industry in Nigeria</p>
								<a href="about.php" class="btn btn-default">Learn More</a>
			  			</div> <!-- / .about__desc -->
		    	  </div>
		    	</div> <!-- / .section_about__content -->
		    </div> <!-- / .row -->
    	</div>
	    
    </section> <!-- / .section__about -->
		
		<!-- section best-rooms -->
    <section class="section__best-rooms">
    	<div class="container">
    		<div class="row">
    		  <div class="col-sm-12"> 		  	
    				<h2 class="section__title">Our <strong>Best rooms</strong></h2>
    				<div class="divider">
    					<hr class="line1">
    					<hr class="line2">
    					<hr class="line1">
    				</div> <!-- / .divider -->
    				<p class="section__subtitle">Come experience a majestic blend of Luxury and comfort with modern designs and contemporary comforts. .</p>
    		  </div>
    		</div> <!-- / .row -->
    	</div> <!-- / .container -->
    	<div class="container">
    		<div class="best-rooms__content">
		    	<div class="row">
		    	  <?php echo $roomList ?>
		    	</div> <!-- / .row -->
		    	 <!-- / .row -->
		    	<div class="row">
			    	<div class="col-xs-12">
			    		<div class="rooms__button">
			    			<a href="rooms.php" class="btn">See all rooms</a>
			    		</div> <!-- / .rooms__button -->
			    	</div>
		    	</div> <!-- / .row -->
		    </div> <!-- / .best-rooms__content -->
	    </div> <!-- / .container -->
    </section> <!-- / .section__best-rooms -->

    <!-- section services --><!-- / .section__services -->

    <!-- section gallery --><!-- / .section__gallery -->

    <!-- section testimonials --><!-- / .section__testimonials -->

    <!-- section Events --><!-- / .section__events -->

		<!-- section Contacts -->
    <section class="section__contacts">
    	<div class="container">
    		<div class="row">
    		  <div class="col-sm-12"> 		  	
    				<h2 class="section__title"><strong>Contact</strong> us</h2>
    				<div class="divider">
    					<hr class="line1">
    					<hr class="line2">
    					<hr class="line1">
    				</div> <!-- / .divider -->
    		  </div>
    		</div> <!-- / .row -->
    	</div> <!-- / .container -->
       <!-- / .section_row -->
      <div class="container">
      	<div class="row">
      	  <div class="col-sm-7">
        	  <div class="section-contacts__form_body">
              

              <!-- Alert message -->
              <div class="alert" id="form_message" role="alert"></div>
							
							<p class="section-contacts__title">Get in touch</p>

              <!-- Please carefully read the README file in order to setup the PHP contact form properly -->
              <form id="form_sendemail" class="contacts__form">
                <div class="form-group">
                  <label for="email">Email address (Required)</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your E-mail">
                  <span class="help-block"></span>
                </div>

                <div class="form-group">
                  <label for="name">Name  (Required)</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Full Name">
                  <span class="help-block"></span>
                </div>

                <div class="form-group">
                  <label for="message">Message  (Required)</label>
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
              </form> <!-- .contacts__form -->
            </div> <!-- / .secction-contacts__form_body -->
	        </div>
	      </div> <!-- / .row -->
      </div> <!-- / .container -->
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
    <script src="assets/plugins/moment-develop/moment.js"></script>
    <script src="assets/plugins/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
		<script src="assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
		<script src="assets/plugins/lightbox/dist/js/lightbox.min.js"></script>
		<script src="assets/plugins/owl-carousel/dist/owl.carousel.min.js"></script>
		<script src="assets/plugins/contact-form/contact.js"></script>

    <!-- JS Custom -->
    <!--build:js assets/js/theme.min.js -->
    <script src="assets/js/theme.js"></script>
    <!-- endbuild -->
		<script src="assets/js/google_maps.js"></script>

    <!-- Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTGnDWmYKPhKslCvPfkrcZDpgT_QMHT0s&amp;callback=initMap" async defer></script>

  </body>

<!-- Mirrored from gamin.simpleqode.com/Sunset/1.0.2/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Aug 2017 15:51:59 GMT -->
</html>