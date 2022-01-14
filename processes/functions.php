<?php 


function resident_data()
{
    global $conn;
    $id = $_GET['id'];
$res_query = mysqli_query($conn,"SELECT tblresidentdata.firstname,tblresidentdata.lastname,tblresidentdata.location,tblresidentdata.dob,
tblresidentdata.age,tblresidentdata.gender,tblresidentdata.parish,tblresidentdata.fpo,tblresidentdata.doa,tblresidentdata.diabilities,
tblresidentdata.status
,tblimages.image1,tblimages.image2,tblimages.image3,tblimages.image4,tblimages.evalform FROM tblresidentdata
JOIN tblimages ON tblresidentdata.id = tblimages.id
WHERE tblresidentdata.id = '$id'");

if($res_query->num_rows > 0){
    while ($row = mysqli_fetch_assoc($res_query))
  {
     $firstname = $row['firstname'];
     $lastname = $row['lastname'];
     $location = $row['location'];
     $gender = $row['gender'];
     $dob = $row['dob'];
     $age = $row['age'];
     $image1 = $row['image1'];
     $image2 = $row['image2'];
     $image3 = $row['image3'];
     $image4 = $row['image4'];
     $evalform = $row['evalform'];
     $parish = $row['parish'];
     $fpo = $row['fpo'];
     $doa = $row['doa'];
     $dis = $row['diabilities'];
     $deceased = $row['status'];
    //  $notes = $row['notes'];
  }

  echo'
  <div class="container">
  <div class="resident-info">
      <div class="col-1">
          <div class="nav-btns">
              <button class="logout-btn">Prev</button>
              <button class="logout-btn">Next</button>
          </div>
          <div class="main-img">
          
              <img src='.$image1.' alt="" class = "main-image">
          </div>
          <div class="small-images">
          <img src='.$image1.'alt="" class = "small-image">
          <img src='.$image2.' alt="" class = "small-image">
          <img src='.$image3.' alt="" class = "small-image">
          <img src='.$image4.'alt="" class = "small-image">
          </div>
      </div>
      
      <div class="col-2">
      <div class="nav-btns">
              <button class="logout-btn"><i class="far fa-file-pdf"></i> View Evalution Form</button>
          </div>
          <div class="resident-bio">
          <p>Resident Name</p>
          <h1>'.$firstname.' '.$lastname.'</h1>
        
          <p><strong>Location:</strong>'.$location.'</p>
          <p><strong>Approx Age: </strong>'.$age.'</p>
          <p><strong>Date of Birth: </strong>'.$dob.'</p>
          <p><strong>Parish of Birth:</strong>' .$parish.'</p>
          <p><strong>Sex:</strong>'.$gender.'</p>
          <p><strong>Fit Person Order:</strong>'.$fpo.'</p>
          <p><strong>Date of Admission:</strong>'.$doa.'</p>
          <p><strong>Disabilities:</strong>'.$dis.'</p>
          '.(($deceased == 'Deceased')?'<p><strong>Status:</strong>'.$deceased.'</p>':'').'
          
          </div>
      </div>
  </div>
</div>

  
  
  ';
     
}else{
    echo "Unable to fetch data!";
   }


}

?>