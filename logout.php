<?php 
session_start();
if(session_destroy())
{
    header("Location: index.php?error = You have logged out");
    // $_SESSION['error'] = "You have successful logged out";
}


?>
