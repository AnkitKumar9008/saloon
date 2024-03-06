<?php   
session_start();

   $conn = mysqli_connect("localhost", "root", "", "saloon");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Connected successfully";
?>