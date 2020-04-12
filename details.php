<?php
include_once('admin/includes/db.php');
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


$similarList='';
 $sql = "SELECT id,title,image,price FROM rooms WHERE category_id='$roomCategory' LIMIT 4";
$query = mysqli_query($con, $sql) or die(mysqli_error($con));
while ($row=mysqli_fetch_array($query)){
	    $roomID = $row[0];
		$roomTitle = $row[1];
		$roomImage = $row[2];
		$roomPrice = $row[3];
		
		$similarList .='<li class="list__item">
                    <a href="#">
                      <figure class="list_item__body">
                        <img src="admin/room_images/'.$roomImage.'" class="img-responsive" alt="...">
                        <figcaption>
                          <h3>'.$roomTitle.'</h3>
                          <div class="item__price">
                            '.$roomPrice.'<small>/ night</small>
                          </div>
                        </figcaption>
                      </figure> <!-- / .list_item__body -->  
                    </a>
                  </li>';
		}

	}
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title><?php echo $roomTitle?> | Sunset Hotel</title>

    <!-- CSS Plugins -->
		<link href="assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/plugins/owl-carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/plugins/owl-carousel/dist/assets/owl.theme.default.min.css">

    <!-- CSS Global -->
    <!--build:css assets/css/theme.min.css-->
    <link rel="stylesheet" href="assets/css/theme.css">
    <!--endbuild-->

  </head>
  <body id="room-detail__page">
		
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
    <section class="section__home">
    	<div class="container">
    	  <div class="row">
    	    <div class="col-sm-12">
    	    	<div class="welcome__content">
							<h3 class="welcome_content__title"><?php echo $roomTitle?></h3>
              <div class="divider blog-divider">
                <hr class="line1">
                <hr class="line2">
                <hr class="line1">
              </div> <!-- / .divider -->
    				</div> <!-- .welcome__content -->
    	    </div>
    	  </div> <!-- / .row -->
    	</div> <!-- / .container -->
    </section> <!-- / .section home -->

    <!-- section room-detail -->
    <section class="section__room-detail">
    	<div class="container">
    	  <div class="row">
    	    <div class="col-sm-7 col-md-8">
    	    	<div class="room_detail__body">
              <div id="room-detail__carousel" class="owl-carousel owl-theme room-detail__gallery">
                <div class="room_gallery__item">
                  <img src="admin/room_images/<?php echo $roomImage?>" class="img-responsive" alt="...">
                </div> <!-- .room_gallery__item -->
               
              </div> <!-- .room-detail__gallery -->
              <div class="room_price__body">
                <h2 class="room__name"><?php echo $roomTitle?></h2>
                <p class="room__price"><span><?php echo $roomPrice?></span> / night</p>
              </div>
              <p class="subheading">Room description</p>
              <div class="room__desc">
               <?php echo $roomDetails?>
              </div>
           <a href="reservation.php?room=<?php echo $roomID ?>" class="btn">Book this room now</a>
            </div> <!-- .room-detail__body -->
          </div>
          <div class="col-sm-5 col-md-4">
    	    	<div class="room-detail__sidebar">
              <div class="room_features__body">
                <p class="subheading">Room features</p>
                <ul class="room__features">
                  <li class="feature__item">
                    <i class="icon ion-android-people"></i>
                    <div class="feature_item__title">
                      Double king bed
                    </div>
                  </li>
                  <li class="feature__item">
                    <i class="icon ion-coffee"></i>
                    <div class="feature_item__title">
                      Breakfast
                    </div>
                  </li>
                  <li class="feature__item">
                    <i class="icon ion-android-sunny"></i>
                    <div class="feature_item__title">
                      Air conditioning
                    </div>
                  </li>
                  <li class="feature__item">
                    <i class="icon ion-wineglass"></i>
                    <div class="feature_item__title">
                      Mini bar
                    </div>
                  </li>
                  <li class="feature__item">
                    <i class="icon ion-wifi"></i>
                    <div class="feature_item__title">
                      Wi-Fi service
                    </div>
                  </li>
                  <li class="feature__item">
                    <i class="icon ion-model-s"></i>
                    <div class="feature_item__title">
                      Free parking
                    </div>
                  </li>
                </ul> <!-- .room__features -->
              </div> <!-- .room_features__body -->
              <div class="similar__rooms">
                <p class="subheading">Similar rooms</p>
                <ul class="similar-rooms__list">
                
                
                <?php echo $similarList?>
                
                
                </ul> <!-- .similar-rooms__list -->
              </div> <!-- .similar__rooms -->
              <div class="info__body">
                <p class="info__title">Information</p>
                <ul class="info__content">
                  <li>
                    <p class="info-text">For more information about rooms please contact us.</p>
                  </li>
                  <li>
                    <i class="icon ion-android-pin"></i>
                    <div class="info-content">
                      <div class="title">Address</div>
                      <div class="description">23, Karimu Kotun Street, Victoria Island, Lagos, Nigeria </div>
                    </div>
                  </li>
                  <li>
                    <i class="icon ion-android-call"></i>
                    <div class="info-content">
                      <div class="title">Phone / Fax</div>
                      <div class="description">+2349055242894 / +2348101869880</div>
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
  	    		</div> <!-- .room-detail__sidebar -->
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
    <script src="assets/plugins/owl-carousel/dist/owl.carousel.min.js"></script>

    <!-- JS Custom -->
    <!--build:js assets/js/theme.min.js -->
    <script src="assets/js/theme.js"></script>
    <!-- endbuild -->

  </body>

<!-- Mirrored from gamin.simpleqode.com/Sunset/1.0.2/room-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Aug 2017 15:54:51 GMT -->
</html>