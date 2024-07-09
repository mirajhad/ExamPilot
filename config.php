<?php 
//session_start();

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ExamPilotDb";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Database selection (optional as it's already selected during connection)
if (!mysqli_select_db($con, $dbname)) {
    die("Database selection failed: " . mysqli_error($con));
}

?>
