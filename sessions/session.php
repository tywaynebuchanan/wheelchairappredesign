<?php 

include('dbconn/dbconn.php');
session_start();
$usercheck = $_SESSION['login_user'];
$ses = mysqli_query($conn,"SELECT * from tblusers where username = '$usercheck'");
$row = mysqli_fetch_assoc($ses);
$login_session = $row['username'];
$name = $row['firstname'].' '.$row['lastname'];
$role = $row['role'];
$time = $row['timeloggedin'];


$ses1 = mysqli_query($conn,"SELECT * from tbllogged where username = '$usercheck'");
$row1 = mysqli_num_rows($ses1);
$data = mysqli_fetch_array($ses1);
$time1 = $data['timeloggedin'];
$time2 = $data['timeloggedout'];


if(!isset($login_session))
{
    mysqli_close($conn);
    header("Location:index.php");

}



?>