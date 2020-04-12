<?php

include("includes/db.php");
$status='';
  
 if(isset($_POST['check_in'])){
  
        //getting the text data from the fields.
		$check_in = preg_replace('#[^0-9a-zA-Z,.)( -]#','',$_POST['check_in']);
		$check_out = preg_replace('#[^0-9a-zA-Z,.)( -]#','',$_POST['check_out']);
		$full_name = preg_replace('#[^0-9a-zA-Z,.)( -]#','',$_POST['full_name']);
		$email = preg_replace('#[^A-Za-z@_]#i', '', $_POST['email']); 
		$phone = preg_replace('#[^0-9 ]#i', '', $_POST['telephone']);
		$roomID = preg_replace('#[^0-9 ]#i', '', $_GET['room']);		
	
	if($check_in>$check_out){$status='Input the correct arrival date';}
	else{
	$query = "INSERT INTO reservation(check_in, check_out, full_name,email,telephone,date,roomID)VALUES ('$check_in','$check_out','$full_name','$email','$phone',now(),'$roomID')";	 
	 $query = mysqli_query($con, $query) or die(mysqli_error($con));
	 if($query){$status= $check_in.' Reservation Successful';}
	 if($status= $check_in){ echo "<script>window.open('index.php','_self')</script>";}	 
	 	
		$sql = "UPDATE rooms SET status='1' WHERE id='$roomID' LIMIT 1";
		 $query = mysqli_query($con, $sql) or die(mysqli_error($con));
		
 }
 }
 
	 
 
 $roomID = preg_replace('#[^0-9 ]#i', '', $_GET['room']);
 $sql = "SELECT id,title,details,category_id,image,price FROM rooms WHERE id='$roomID' LIMIT 1";
$query = mysqli_query($con, $sql) or die(mysqli_error($con));
while ($row=mysqli_fetch_array($query)){
	    $roomID = $row[0];
		$roomTitle = $row[1];
		$roomDetails = $row[2];
		$roomCategory = $row[3];
		$roomImage = $row[4];
		$roomPrice = $row[5];}
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>Reservation | Sunset Hotel</title>

    <!-- CSS Plugins -->
		<link href="assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css">

    <!-- CSS Global -->
    <!--build:css assets/css/theme.min.css-->
    <link rel="stylesheet" href="assets/css/theme.css">
    <!--endbuild-->

  </head>
  <body id="reservation__page">
		
		<!-- Info Section
    ================================================== -->
		<?php include('template_header.php'); ?> 
        <!-- .section__info -->

  	<!-- Navbar
    ================================================== -->
    <nav class="navbar navbar-default">
      <div class="container">
    
        <!-- Header -->
        <div class="navbar-header">

          <!-- Collapse toggle -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar__collapse" aria-expanded="false">
            <span class="sr-only">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <!-- Logo -->
          <a class="navbar-brand" href="index.html">
            <h1 class="navbar-brand__logo">Sunset Hotel</h1>
            <p class="navbar-brand__sublogo">Grand</p>
          </a>

        </div> 
        <!-- / .navbar-header -->
    
        <!-- Links -->
        <?php include('header.php'); ?>
        <!-- /.navbar-collapse -->

      </div><!-- /.container -->
    </nav>

    <!-- CONTENT
      ================================================== -->

    <!-- section home -->
    <section class="section__home">
    	<div class="container">
    	  <div class="row">
    	    <div class="col-sm-12">
    	    	<div class="welcome__content">
							<h1 class="welcome_content__title">Reservation</h1>
    				</div> <!-- .welcome__content -->
    	    </div>
    	  </div> <!-- / .row -->
    	</div> <!-- / .container -->
			<div class="home__bg"></div>
    </section> <!-- / .section home -->

    <!-- section reservation -->
    <section class="section__reservation">
    	<div class="container">
    	  <div class="row">
    	    <div class="col-sm-5 col-sm-push-7 col-md-4 col-md-push-8">
    	    	<div class="booking__details-body">
    	    		<p class="subheading">Booking details</p>
    	    		<h2 class="section__heading">Selected room</h2>
    	    		<figure class="room__details">
								<img src="admin/room_images/<?php echo $roomImage?>"  class="img-responsive" alt="...">
								<figcaption>
									<h3><?php echo $roomTitle?></h3>
									<div class="room__price">
										><?php echo $roomPrice?><small>/ night</small>
									</div>
									<p class="room__desc"><?php echo $roomDetails?></p>
								</figcaption>
							</figure> <!-- / .room__details -->
							<ul class="details-info">
                
  	    		</div> <!-- .booking__details-body -->
  	    		<div class="info__body">
							<p class="info__title">Information</p>
							<ul class="info__content">
                <li>
                  <p class="info-text">If you have some questions with booking please contact us.</p>
                </li>
	              <li>
	                <i class="icon ion-android-pin"></i>
	                <div class="info-content">
	                  <div class="title">Address</div>
	                  <div class="description">23, Karimu Kotun Street, Victoria Island, Lagos, Nigeria

</div>
	                </div>
	              </li>
	              <li>
	                <i class="icon ion-android-call"></i>
	                <div class="info-content">
	                  <div class="title">Phone / Fax</div>
	                  <div class="description">09055242894 / 08101869880</div>
	                </div>
	              </li>
	              <li>
	                <i class="icon ion-android-mail"></i>
	                <div class="info-content">
	                  <div class="title">E-mail</div>
	                  <div class="description">liztosin@gmail.com</div>
	                </div>
	              </li>
	            </ul> <!-- .info__content -->
  	    		</div> <!-- / .info__body -->
    	    </div>
    	    <div class="col-sm-7 col-sm-pull-5 col-md-8 col-md-pull-4">
    	    	<div class="reservation__form-body">
    	    		<p class="subheading">Booking form</p>
    	    		<h2 class="section__heading">Personal info</h2>

							<!-- Alert message -->
              <div class="alert" id="form_reservation" role="alert"></div>

              <!-- Please carefully read the README.pdf file in order to setup the PHP reservation form properly -->

              <form id="reservation-form" class="reservation__form" data-animate-in="animateUp" method="post">
              	<div class="col-sm-12 col-md-6">
              		<div class="form-group">
	                  <label for="check-in" class="sr-only">Arrival date</label>
	                  <input type="date" name="check_in" class="form-control" id="check-in">
	                  <span class="help-block"></span>
	                </div>
	              </div>
	              <div class="col-sm-12 col-md-6">
	              	<div class="form-group">
	                  <label for="check-out" class="sr-only">Departure date</label>
	                  <input type="date" name="check_out" class="form-control" id="check-out">
	                  <span class="help-block"></span>
	                </div>
	              </div>
	              	
              	<div class="col-sm-12 col-md-6">
              		<div class="form-group">
	                  <label for="first_name" class="sr-only">Full Name</label>
	                  <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Full Name">
	                  <span class="help-block"></span>
	                </div>
	              </div>
	              <div class="col-sm-12 col-md-6">
	                <div class="form-group">
	                  <label for="email" class="sr-only">Email</label>
	                  <input type="email" name="email" class="form-control" id="email" placeholder="Email">
	                  <span class="help-block"></span>
	                </div>
	              </div>
	              <div class="col-sm-12 col-md-6">
	                <div class="form-group">
	                  <label for="phone" class="sr-only">Phone</label>
	                  <input type="tel" name="telephone" class="form-control" placeholder="Phone">
	                  <span class="help-block"></span>
	                </div>
	              </div>
	             
               	<div class="col-sm-12">
               		<p>
               			<input type="checkbox" name="checkbox"> I have read and accept <a href="#" class="conditions">the terms and conditions.</a>
               		</p>
               		<button type="submit" class="btn btn-booking">Book now</button>
               	</div>
              </form> <!-- .reservation__form -->
            </div> <!-- .reservation__form-body -->
          </div>
    	  </div> <!-- / .row -->
    	</div> <!-- / .container -->
    </section> <!-- / .section reservation -->

		<!-- section footer -->
    <?php include('footer.php'); ?> 
    <!-- .section__footer -->

    <!-- 
    ================================================== -->

    <!-- JS Global -->
    <script src="assets/plugins/jquery/jquery-1.12.4.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- JS Plugins -->
		<script src="assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>

    <!-- JS Custom -->
    <!--build:js assets/js/theme.min.js -->
    <script src="assets/js/theme.js"></script>
    <!-- endbuild -->
<script type="text/javascript" language="javascript">
    
		 
  </body>

</html>