<?php include ('sessions/session.php');
include('templates/header.php');
include('templates/navbar.php');
if($_GET){
    echo "<div class ='container'>
    <div class = 'modal-content hideMessage'>
    ".$_GET['message']."
    </div>
    </div>";    
}


include('templates/myaccount.view.php');
include('templates/footer.php');


?>