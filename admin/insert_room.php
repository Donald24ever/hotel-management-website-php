<?php

include("includes/db.php");
$status='';
 if(isset($_POST['insert_post'])){
  
        //getting the text data from the fields.
		$title = preg_replace('#[^0-9a-zA-Z,.)( -]#','',$_POST['title']);
		$price = preg_replace('#[^0-9a-zA-Z,.)( -]#','',$_POST['price']);
		$category = preg_replace('#[^0-9a-zA-Z,.)( -]#','',$_POST['category_id']);
		$details = mysqli_real_escape_string($con,$_POST['details']);
	//	$accomodation_keywords = preg_replace('#[^0-9a-zA-Z,.)( -]#','',$_POST['keywords']);
	$query = "INSERT INTO rooms(title,price,details,category_id)VALUES ('$title','$price','$details','$category')";
	 
	 $insert_room = mysqli_query($con, $query) or die(mysqli_error($con));
	 
	 if($insert_room){
	 //UPLOAD IMAGE
if (isset($_FILES["image"]["name"]) && $_FILES["image"]["tmp_name"] != ""){
			$fileName = $_FILES["image"]["name"];
			$fileTmpLoc = $_FILES["image"]["tmp_name"];
			$fileType = $_FILES["image"]["type"];
			$fileSize = $_FILES["image"]["size"];
			$fileErrorMsg = $_FILES["image"]["error"];
			$kaboom = explode(".", $fileName);
			$fileExt = strtolower(end($kaboom));
			list($width, $height) = getimagesize($fileTmpLoc);
			if($width < 10 || $height < 10){$status = 'Your image is too tiny';}
			else if($fileSize > 3048576) {$status = 'The image is too large';} 
			else if (!preg_match("/\.(jpg)$/i", $fileName)) {$status = 'Sorry, JPEG (.jpg) images only';} 
			else if ($fileErrorMsg == 1) {$status = 'Oops! An unknown error occurs, Please try again';}
			
			else{$picFilename= rand(2000,10000).time().'.'.$fileExt;
				$picurl = "room_images/$picFilename";
				$moveResult = move_uploaded_file($fileTmpLoc,strtolower($picurl));
			/**
				include_once("includes/image_resize.php");
				$target_file = $picurl;
				$resized_file = $picurl;
				$wmax = 1000;
				$hmax = 1000;
				img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);	
			**/
				
			// UPDATE ACCOMMODATION IMAGE TO DATABASE
			$lastID = mysqli_insert_id($con);
			
	 $sql = "UPDATE rooms SET image='$picFilename' WHERE id='$lastID' LIMIT 1";	 
	 $query = mysqli_query($con, $sql) or die(mysqli_error($con));	
				$status = 'Room successfully uploaded';}
			}
		 
	 }
  
  
  }

//GETTING CATEGORY LIST
$catList ='';
$sql = "SELECT id,title from categories";
$query = mysqli_query($con, $sql);
while ($row=mysqli_fetch_array($query)){
	    $catID = $row[0];
		$catTitle = $row[1];
		$catList .='<option value="'.$catID.'">'.$catTitle.'</option>';
    }	
					
					
?>
<!DOCTYPE>
<html>
    <head>
	    <title>Inserting Rooms</title>
		
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });
  </script>
    </head>
	
<body bgcolor="brown">

<?php echo $status ?>
    <form action="insert_room.php" method="post" enctype="multipart/form-data">
<div><? echo $status ?></div>
        <table align="center" width="700" border="2" bgcolor="grey">
		
		    <tr align="center">
			    <td colspan="7"><h2>Insert New Post Here</h2></td>
			</tr>
			
			 <tr>
			    <td align="right"><b>Room Title:</b></td>
				<td><input type="text" name="title" size="60" required /></td>
			</tr>
			
			 <tr>
			    <td align="right"><b>Category:</b></td>
				<td>
				<select name="category_id" required>
				    <option>Select a Room Category</option>
                    <?php echo $catList ?>
</select>
				
				</td>
			</tr>
			
			 <tr>
			    <td align="right"><b>Room Image:</b></td>
				<td><input type="file" name="image" required/></td>
			</tr>
			
			 <tr>
			    <td align="right"><b>Room Price:</b></td>
				<td><input type="text" name="price" required/></td>
			</tr>
			
			 <tr>
			    <td align="right"><b>Room Detail:</b></td>
				<td><textarea name="details" cols="20" rows="10"></textarea></td>
			</tr>
			
			 
			 <tr align="center">
				<td colspan="7"><input type="submit" name="insert_post" value="Insert Now" /></td>
			</tr>
			 
			
		</table>




</body>
</html>