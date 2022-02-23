<?php 

$p = '70CCD9007338D6D81DD3B6271621B9CF9A97EA00';
$username = $_GET['username'];
$def_password = $p;

$query = mysqli_query($conn,"UPDATE tblusers SET password = '$def_password' WHERE username = '$username'");
if($query){
    header('Location:admin.php?message = "Password result to default password"');
}else {
    header('Location:admin.php?message = "Unknown error has occured.');
}

?>