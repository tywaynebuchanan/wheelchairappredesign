<?php 
include('sessions/session.php');

// if(session_destroy())
// {
//     $sql = mysqli_query($conn,"UPDATE tblusers set timeloggedout =now() where username = '$username'");
//     header("Location: index.php?error = You have logged out");
   
// }

session_start();
$time = date("H:i:s");
$date = time();
// mysqli_query($conn, "INSERT INTO tbllogged (username,timeloggedout) VALUES('$usercheck','$time')");
mysqli_query($conn, "UPDATE tbllogged set timeloggedout = $date WHERE username = '$usercheck'");
$_SESSION = NULL;
$_SESSION = [];
session_unset();
session_destroy();
header("location:index.php");


?>
