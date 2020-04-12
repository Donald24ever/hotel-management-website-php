<?php
include_once('admin/includes/db.php');

$kondition='';

		
			 $statusCondition = "WHERE status='0'";
        if(isset($_GET['cat'])) {
			 $catID = $_GET['cat'];
			 $kondition = "WHERE category_id='$catID'";
			 $statusCondition = "AND status='0'";
	}
$roomList ='';
$sql = "SELECT id,title,details,category_id,image,price FROM rooms $kondition $statusCondition ORDER BY RAND()";
$query = mysqli_query($con, $sql) or die(mysqli_error($con));
while ($row=mysqli_fetch_array($query)){
	    $roomID = $row[0];
		$roomTitle = $row[1];
		$roomDetails = $row[2];
		$roomCategory = $row[3];
		$roomImage = $row[4];
		$roomPrice = $row[5];
		
		
$tql = "SELECT title FROM categories WHERE id='$roomCategory' LIMIT 1";
$tuery = mysqli_query($con, $tql) or die(mysqli_error($con));
while ($row=mysqli_fetch_array($tuery)){$katname = $row[0];}
		
		$roomList .='<div class="col-md-4 col-sm-6">
            <div class="rooms__item">
              <div class="rooms__pic">
                <img src="admin/room_images/'.$roomImage.'" class="img-responsive" alt="...">
              </div> <!-- / .about__pic -->
              <div class="rooms__desc">
                <div class="rooms_desc__header">
                  <h2 class="rooms_desc__title">'.$roomTitle.'</h2>
                  <p class="rooms_desc__price"><span>N'.number_format($roomPrice).'</span> / night</p>
                </div> <!-- .rooms_desc__header -->
                <p class="rooms_desc__desc">'.$roomDetails.'</p>
                  <ul class="rooms_desc__services">
                    <li><i class="icon ion-android-person"></i> '.$katname.'</li>
                    <li><i class="icon ion-android-person"></i> One king bed</li>
                    <li><i class="icon ion-coffee"></i> Breakfast</li>
                    <li><i class="icon ion-android-sunny"></i> Air conditioning</li>
                    <li><i class="icon ion-wineglass"></i> Mini bar</li>
                    <li><i class="icon ion-monitor"></i> LCD TV</li>
                    <li><i class="icon ion-wifi"></i> Wi-Fi</li>
                  </ul> <!-- .rooms_desc__services -->
                <a href="details.php?id='.$roomID.'" class="btn btn-rooms">View details</a>
              </div> <!-- / .rooms__desc -->
            </div> <!-- .rooms__item -->
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

    <title>Rooms 2 | Sunset Hotel</title>

    <!-- CSS Plugins -->
		<link href="assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css">

    <!-- CSS Global -->
    <!--build:css assets/css/theme.min.css-->
    <link rel="stylesheet" href="assets/css/theme.css">
    <!--endbuild-->

  </head>
  <body id="rooms-2__page">
		
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
							<h1 class="welcome_content__title">Our rooms</h1>
	  					<p class="welcome_content__desc">Get a look and feel of our best rooms.</p>
		  			</div> <!-- .welcome__content -->
    	    </div>
	    	</div> <!-- / .row -->
    	</div> <!-- / .container -->
			<div class="home__bg"></div>
    </section> <!-- / .section__home -->

    <!-- section rooms-1 -->
    <section class="section__rooms-2">
    	<div class="container">
    		<div class="row">
          <?php echo $roomList?>
        </div> <!-- .row -->
        <div class="row">
          <div class="col-sm-12">
        
            <nav aria-label="Page navigation">
              <ul class="pagination">
                <li>
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
        
          </div>
        </div> <!-- / .row -->
	    </div> <!-- / .container -->
    </section> <!-- / .section__rooms-1 -->

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
		<script src="assets/plugins/lightbox/dist/js/lightbox.min.js"></script>
		<script src="assets/plugins/isotope/isotope.pkgd.min.js"></script>
		<script src="assets/plugins/imagesloaded/imagesloaded.pkgd.min.js"></script>

    <!-- JS Custom -->
    <!--build:js assets/js/theme.min.js -->
    <script src="assets/js/theme.js"></script>
    <!-- endbuild -->

  </body>


</html>