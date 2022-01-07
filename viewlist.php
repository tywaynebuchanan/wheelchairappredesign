<?php 
include('sessions/session.php');
include('templates/header.php');
include('templates/navbar.php');
$home = $_GET['home'];
$location = $_GET['location'];
$_SESSION['location'] = $location;

?>

<section class="section-hero">
<div class="hero">
    <div class="container">
    <h1 class="heading-primary"><?php echo $location;?></h1>
    </div>
    
</div>
</section>

<div class="message">
    <?php if(!empty($_SESSION['message'])) { ?>
    <p class="error"><i class="fas fa-times"></i> <?php echo $_SESSION['message'];?></p>
    <?php unset($_SESSION['message']);} ?>
</div>

<?php 

function fetch_data()
{
  global $conn;
  global $home;
  $output = '';
  $query = mysqli_query($conn,"SELECT * FROM tblresidentdata WHERE location1 = '$home'");
$count = mysqli_num_rows($query);

  while ($row_data = mysqli_fetch_assoc($query))
{
    $firstname = $row_data['firstname'];
    $lastname = $row_data['lastname'];
    $location = $row_data['location'];
    $home = $row_data['location1'];
    $age = $row_data['age'];
    $gender = $row_data['gender'];
   $id = $row_data['id'];
   

    $output .= '<tr><td>'.$firstname.'</td><td>'.$lastname.'</td><td>'.$gender.'</td><td>'.$location.'</td><td>'.$age.'</td>
    <td><a class = "info-btn c-success" href = "viewresidents.php?id='.$id.'&home='.$home.'&location='.$location.'"><i class="far fa-eye"></i></a></td><td><a class = "info-btn c-primary" href ="../edit.php?edit='.$id.'"><i class="fas fa-user-edit"></i></a></td><td>
    <a class = "info-btn c-info" href ="../repairdata.php?repair='.$id.'"><i class="fas fa-tools"></i></a></td></tr>';
}
return $output;
}






?>

<div class="back-btn">
<a href="dashboard.php" class="logout-btn"><i class="fas fa-arrow-circle-left"></i> Back</a>
<a href="filterdata.php?home=<?php echo $home?>&location=<?php echo $location?>&gender=Male" id="btn" class="logout-btn"><i class="fas fa-mars"></i> Male</a>
<a href="filterdata.php?home=<?php echo $home?>&location=<?php echo $location?>&gender=Female" id="btn" class="logout-btn"><i class="fas fa-venus"></i> Female</a>
<a href="filterdata.php?home=<?php echo $home?>&location=<?php echo $location?>&wheelchair=Yes" id="btn" class="logout-btn"><i class="fas fa-wheelchair"></i> In WC</a>
<a href="testpdf.php?home=<?php echo $home?>&location=<?php echo $location?>" id="btn" class="logout-btn"><i class="fas fa-wheelchair"></i>Print</a>
<!-- <div class="btn-end">
  <form action="testpdf.php" method = "post">
    <input type="submit" name = "print" class = "logout-btn" value="Print">
  </form>
</div> -->

</div>

<?php



?>
<section>
    <div class="view-res-data">
    <div class="table-info container">
    <table>
      <thead>
        <tr>
          <td>First Name</td>
          <td>Last Name</td>
          <td>Gender</td>
          <td>Location</td>
          <td>Age</td>
          <td colspan = '3'>Action</td>
          </tr>
      <thead>
      <tbody id="tbody">
          <?php 
            
          echo fetch_data();
          ?>

          
      </tbody>
    </table>
    <!-- <p>Resident Count:<?php $count?></p> -->
   
    </div>
    </div>
</section>

<?php include('templates/footer.php')?>


