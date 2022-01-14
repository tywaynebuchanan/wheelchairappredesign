<?php include('sessions/session.php');
include('templates/header.php');
include('templates/navbar.php');
$gender = $_GET['gender'];
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

$query = mysqli_query($conn,"SELECT * FROM tblresidentdata WHERE location1 = '$home' AND gender ='$gender'");
$query_count = mysqli_query($conn, "SELECT * from tblresidentdata WHERE gender = 'Male' and location1 = '$home' AND status != 'Deceased'");
$count = mysqli_num_rows($query_count);



?>

<div class="back-btn">
<a href="viewlist.php?home=<?php echo $home?>&location=<?php echo $location?>" class="logout-btn"><i class="fas fa-undo"></i> Refresh</a>
<a href="filterdata.php?home=<?php echo $home?>&location=<?php echo $location?>&gender=Male" id="btn" class="logout-btn"><i class="fas fa-mars"></i> Male</a>
<a href="filterdata.php?home=<?php echo $home?>&location=<?php echo $location?>&gender=Female" id="btn" class="logout-btn"><i class="fas fa-venus"></i> Female</a>
<a href="testpdf.php?home=<?php echo $home?>&location=<?php echo $location?>&gender=<?php echo $gender?>" id="btn" class="logout-btn"><i class="fas fa-print"></i>Print</a>
<div class="btn-end">
<p><?php echo $gender?> Count:<?php echo $count?></p>
</div>



</div>
<section>
    <div class="view-res-data">
    <div class="table-info container">
    <table>
      <thead>
        <tr>
          <td>First Name</td>
          <td>Last Name</td>
          <td>Gender</td>
          <td>Mobility</td>
          <td>Location</td>
          <td>Age</td>
          <td colspan = '3'>Action</td>
          </tr>
      <thead>
      <tbody id="tbody">
          <?php 
           
            if($query->num_rows > 0){
                while ($row_data = mysqli_fetch_assoc($query))
              {
                  $firstname = $row_data['firstname'];
                  $lastname = $row_data['lastname'];
                  $location = $row_data['location'];
                  $home = $row_data['location1'];
                  $age = $row_data['age'];
                  $gender = $row_data['gender'];
                 $id = $row_data['id'];
                 $isMobile = $row_data['wheelchairbound'];
                 $deceased = $row_data['status'];
                 

                  echo  (($deceased !='Deceased')?'<tr><td>'.$firstname.'</td><td>'.$lastname.'</td><td>'.$gender.'</td><td>'.(($isMobile =='Yes')?'<i class="fas fa-wheelchair"></i>':'<i class="fas fa-walking"></i>').'</td><td>'.$location.'</td><td>'.$age.'</td>
                  <td><a class = "info-btn c-success" href = "viewresidents.php?id='.$id.'&home='.$home.'&location='.$location.'"><i class="far fa-eye"></i></a></td><td><a class = "info-btn c-primary" href ="../edit.php?edit='.$id.'"><i class="fas fa-user-edit"></i></a></td><td>
                  <a class = "info-btn c-info" href ="../repairdata.php?repair='.$id.'"><i class="fas fa-tools"></i></a></td></tr>':'<tr class = "c-danger c-light"><td>'.$firstname.'</td><td>'.$lastname.'</td><td>'.$gender.'</td><td>'.(($isMobile =='Yes')?'<i class="fas fa-wheelchair"></i>':'<i class="fas fa-walking"></i>').'</td><td>'.$location.'</td><td>'.$age.'</td>
                  <td><a class = "info-btn c-success" href = "viewresidents.php?id='.$id.'&home='.$home.'&location='.$location.'"><i class="far fa-eye"></i></a></td><td><a class = "info-btn c-primary" href ="../edit.php?edit='.$id.'"><i class="fas fa-user-edit"></i></a></td><td>
                  <a class = "info-btn c-info" href ="../repairdata.php?repair='.$id.'"><i class="fas fa-tools"></i></a></td></tr>');
              }
            }else{
                $_SESSION['message'] = "Unable to retrieve data";
            }
          ?>

          
      </tbody>
    </table>
    </div>
    </div>
</section>

<?php include('templates/footer.php')?>