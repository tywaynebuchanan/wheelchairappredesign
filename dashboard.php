<?php include ('sessions/session.php');
include('templates/header.php');
include('templates/navbar.php');

?>

<body>
    <?php include('templates/hero.php') ?>
    <?php if(!empty($_SESSION['message'])) {?>
        <p class="error"><i class="fas fa-times"></i> <?php echo $_SESSION['message'];?></p>
        <?php 
            unset($_SESSION['message']);
    } ?>
    <?php include('templates/info.php');?>

<?php include('templates/footer.php') ?>
</body>
</html>