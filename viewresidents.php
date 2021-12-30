<?php 
include('sessions/session.php');
include('templates/header.php');
include('templates/navbar.php');
$id = $_GET['id'];
$home = $_GET['home'];
$location = $_GET['location'];
?>

<div class="message">
    <?php if(!empty($_SESSION['message'])) {?>
    <p class="error"><i class="fas fa-times"></i> <?php echo $_SESSION['message'];?></p>
    <?php unset($_SESSION['message']);} ?>
</div>


<div class="back-btn">
<a href = <?php echo 'viewlist.php?home='.$home.'&location='.$location.''?> class="logout-btn">Back</a>


</div>

<?php include('templates/resident.view.php');?>
<?php include('templates/footer.php');