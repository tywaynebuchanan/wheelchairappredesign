<?php include ('sessions/session.php');
include('templates/header.php');
include('templates/navbar.php');
include('processes/summary.php');

?>

<body>
    <?php include('templates/hero.php') ?>

        <?php if(isset($_SESSION['message'])) 
            {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        ?>
        
    
    
    <?php include('templates/info.php');?>

<?php include('templates/footer.php') ?>
</body>
</html>