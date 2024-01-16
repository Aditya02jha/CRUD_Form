<?php

$servername = "localhost";
	$username = "root";
	$password = "Aditya@12";
	
	// Create connection
	$conn = mysqli_connect($servername, $username, $password , "temp");

//  $sql = "CREATE Table Contact_Form (
//      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//      name VARCHAR(30) NOT NULL,
//      number VARCHAR(10) NOT NULL,
//      age INT(3) NOT NULL,
//      email VARCHAR(30) NOT NULL
//  )";

// if(mysqli_query($conn, $sql)){
//     echo("table created successfully");
// }
// else{
//     echo("failed to create table". $conn->error );
// }

// mysqli_close($conn);
