<?php
$conn_error = "Could not connect";
$config = parse_ini_file('auth\config.ini'); 
$conn = mysqli_connect($config['servername'],$config['username'],$config['password']) or die ('The username or password is incorrect');
mysqli_select_db($conn,$config['dbname']) or die('Not such database present');

?>