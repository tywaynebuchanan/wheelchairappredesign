<?php 
session_start();
include('dbconn/dbconn.php');
$_SESSION['home'] = $_GET['home'];

?>