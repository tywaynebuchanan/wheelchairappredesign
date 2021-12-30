<?php include("sessions/session.php");
include("templates/header.php"); 
include("templates/navbar.php");?>

<body>

<?php if(!empty($_SESSION['message'])) {?>
        <p class=<?php echo $_SESSION['msg-color']?>><i class="fas fa-times"></i> <?php echo $_SESSION['message'];?></p>
        <?php 
            unset($_SESSION['message']);
    } ?>
</body>
</html>

