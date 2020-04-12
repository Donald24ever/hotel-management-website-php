<?php
include_once('admin/includes/db.php');

$catList ='';
$sql = "SELECT id,title from categories";
$query = mysqli_query($con, $sql);
while ($row=mysqli_fetch_array($query)){
	    $catID = $row[0];
		$catTitle = $row[1];
		$catList .= "<li><a href='rooms.php?cat=$catID'>$catTitle</a></li>";
    }
	
	
?>



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
          <a class="navbar-brand" href="index.php">
            <h1 class="navbar-brand__logo">Sunset Hotel</h1>
            <p class="navbar-brand__sublogo">Grand</p>
          </a>

        </div> <!-- / .navbar-header -->
    
        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbar__collapse">
          <ul class="nav navbar-nav navbar-left">
            <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
            <li><a href="about.php">About us</a></li>
            <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Rooms <i class="icon ion-chevron-down"></i></a>
	          <ul class="dropdown-menu">
	            <?php echo $catList; ?> 
	          </ul>
	        </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="contacts.php">Contacts</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->

      </div>