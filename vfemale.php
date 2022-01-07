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


<div class="back-btn">
<a href="viewlist.php?home=<?php echo $home?>&location=<?php echo $location?>" class="logout-btn"><i class="fas fa-undo"></i> Refresh</a>
<a href="vmale.php?home=<?php echo $home?>&location=<?php echo $location?>&gender=Male" id="btn" class="logout-btn"><i class="fas fa-mars"></i> Male</a>
<a href="vfemale.php?home=<?php echo $home?>&location=<?php echo $location?>&gender=Female" id="btn" class="logout-btn"><i class="fas fa-venus"></i> Female</a>

<!-- <button id="btn" class="logout-btn">Male</button> -->



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
          <td>Location</td>
          <td>Age</td>
          <td colspan = '3'>Action</td>
          </tr>
      <thead>
      <tbody id="tbody">
          <?php 
            $query = mysqli_query($conn,"SELECT * FROM tblresidentdata WHERE location1 = '$home' AND gender ='$gender'");
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
                 

                  echo '<tr><td>'.$firstname.'</td><td>'.$lastname.'</td><td>'.$gender.'</td><td>'.$location.'</td><td>'.$age.'</td>
                  <td><a class = "info-btn c-success" href = "viewresidents.php?id='.$id.'&home='.$home.'&location='.$location.'">View</a></td><td><a class = "info-btn c-primary" href ="../edit.php?edit='.$id.'">Edit</a></td><td>
                  <a class = "info-btn c-info" href ="../repairdata.php?repair='.$id.'">Repairs</a></td></tr>';
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