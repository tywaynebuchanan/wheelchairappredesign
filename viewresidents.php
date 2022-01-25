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


<div class="back-btn" id = "backbtn">
<a href = <?php echo 'viewlist.php?home='.$home.'&location='.$_SESSION['location'].''?> class="logout-btn">
<i class="fas fa-arrow-circle-left"></i> Back</a>
</div>

<?php include('templates/resident.view.php');?>
<?php include('templates/footer.php'); ?>

<script>
    let productImg = document.getElementById('productImg');
let smallimg = document.getElementsByClassName('small-image');

let images = [smallimg[1],smallimg[2],smallimg[3],smallimg[4]];
let i = 0;
 let nextbtn = document.getElementById("next").addEventListener('click',()=>{
   if(i >= images.length - 1) i = -1;
     i++;
    productImg.src = smallimg[i].src;
 })

 let prevbtn = document.getElementById("prev").addEventListener('click',()=>{
  if(i <= 0) i = images.length;
  i--;
  productImg.src = smallimg[i].src;
})


smallimg[0].onclick = function () {
  productImg.src = smallimg[0].src;
}

smallimg[1].onclick = function () {
  productImg.src = smallimg[1].src;
}
smallimg[2].onclick = function () {
  productImg.src = smallimg[2].src;
}

smallimg[3].onclick = function () {
  productImg.src = smallimg[3].src;
}
</script>

