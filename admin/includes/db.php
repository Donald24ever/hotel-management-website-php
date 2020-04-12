<?php
$con = mysqli_connect("localhost", "root", "", "hotel");
// Evaluate the connection
if (mysqli_connect_errno()) {
   echo mysqli_connect_error();
    exit();
}
?>