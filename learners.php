<?php
$status='';
  
 if(isset($_POST['full_name'])){
  
        //getting the text data from the fields.
		$full_name = preg_replace('#[^0-9a-zA-Z,.)( -]#','',$_POST['full_name']);
		$email = preg_replace('#[^A-Za-z@_]#i', '', $_POST['email']); 
		$date_of_birth = preg_replace('#[^0-9a-zA-Z,.)( -]#','',$_POST['date_of_birth']);
		$phone = preg_replace('#[^0-9 ]#i', '', $_POST['telephone']);	
	
	$query = "INSERT INTO learners(full_name,email, date_of_birth,telephone,date)VALUES ('$full_name','$email', '$date_of_birth','$phone',now())";	 
	 $query = mysqli_query($con, $query) or die(mysqli_error($con));
		
 
 }

if(isset($_GET['search'])) {
$search_query = $_GET['user_query'];
$sql = "SELECT * FROM learners WHERE full_name like '%$search_query%'";
$query = mysqli_query($con, $sql) or die(mysqli_error($con));
while ($row=mysqli_fetch_array($query)){
	    $learnerID = $row[0];
	    $fullName = $row[1];
	    $learnerEmail = $row[2];
	    $dateofBirth = $row[3];
	    $learnerTelephone = $row[4];

echo "
			       <div>
				   
				     <h3>$fullName</h3>
				      <p><b>$learnerEmail </b></p>
                                      <p><b>$dateofBirth </b></p>
                                       <p><b>$learnerTelephone</b></p>
						
						
						<a href='learner.php'><button style='float:right'>Done</button></a>
				   
				   </div>
			
			
			";
		
		
		
		
		
		}
} 
	 
 

?>

<!DOCTYPE>
<html>
    <head>
	    <title>Inserting learners</title>
		
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });
  </script>
    </head>
	
<body bgcolor="brown">

<?php echo $status ?>
   <form action="leaners.php" method="post" enctype="multipart/form-data">
   <div><? echo $status ?></div>
        <table align="center" width="700" border="2" bgcolor="grey">
            <fieldset>
			    <legend>Student Details: </legend>
				<label for="full_name">Full Name: </label><input type="text" name="full_name" id="name" required autofocus placeholder="Enter your full name here"/>
				<label for="email">Email: </label><input type="text" name="email" id="email" required placeholder="Your Email" title="Please enter in a valid email address"/>
         <label>Date of Birth </label><input id="date_of_birth" type="date" name="date_of_birth" min="2018-9-22">
				<label for="phone">Phone: </label><input type="tel" name="phone" id="phone" required placeholder="Please enter in your phone number" pattern="[0-9]{4} [0-9]{3} [0-9]{4}" title="Please enter in a phone number in this format: #### ### ####"/>
			</fieldset>

<input type="submit" name="submit" value="Click here to submit" />
		</fieldset>
		</form>

<br>
<form method="get" action="learners.php" enctype="multipart/form-data">
<fieldset>
			    <legend>Learners:</legend>
		        <input type="text" name="user_query" placeholder="search for a learner" />
				<input type="submit" name="search" value="search" />
		    </form>
			

</body>
</html>