<?php
include('sessions/session.php');
include('templates/header.php');
include('templates/admin.nav.php');
include('templates/adduser.view.php');


if(isset($_POST['submit']))
{
   $firstname = mysqli_escape_string($conn,$_POST['firstname']);
   $lastname = mysqli_escape_string($conn,$_POST['lastname']);
   $username = mysqli_escape_string($conn,$_POST['username']);
   $password = mysqli_escape_string($conn,$_POST['password']);
   $conpassword = mysqli_escape_string($conn,$_POST['confirmpassword']);
   $role = mysqli_escape_string($conn,$_POST['role']);
   $active = mysqli_escape_string($conn,$_POST['active']);

   $conpassword = sha1($_POST['confirmpassword']);
   $query = mysqli_query($conn, "INSERT into tblusers (username,password,firstname,lastname,role,isActive) 
   VALUES('$username','$conpassword','$firstname','$lastname','$role','$active')") or die($query->error);

if ($query) {
    
 
    $_SESSION['message'] = 'User information added';
    $_SESSION['msg-color'] = 'success';
    
  } else {
      $_SESSION['message'] = $conn->error;
        $_SESSION['msg-color'] = 'danger';
  }

  $conn->close();
}

include('templates/footer.php');
?>