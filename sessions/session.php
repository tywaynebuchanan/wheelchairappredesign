<?php 

include('dbconn/dbconn.php');
session_start();
$usercheck = $_SESSION['login_user'];
$ses = mysqli_query($conn,"SELECT * from tblusers where username = '$usercheck'");
$row = mysqli_fetch_assoc($ses);
$login_session = $row['username'];
$name = $row['firstname'].' '.$row['lastname'];

if(!isset($login_session))
{
    mysqli_close($conn);
    header("Location:index.php");

}



?>