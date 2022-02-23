<?php 


function resident_data()
{
    global $conn;
    $id = $_GET['id'];
$res_query = mysqli_query($conn,"SELECT tblresidentdata.firstname,tblresidentdata.lastname,tblresidentdata.location,tblresidentdata.dob,
tblresidentdata.age,tblresidentdata.gender,tblresidentdata.parish,tblresidentdata.fpo,tblresidentdata.doa,tblresidentdata.diabilities,
tblresidentdata.status,tblresidentdata.tubefed,tblimages.image1,tblimages.image2,tblimages.image3,tblimages.image4,tblimages.evalform,tblchrist.id,tblchrist.baptised,
tblchrist.date, tblchrist.locale, tblchrist.priest,tbltubeinfo.tubefed,tbltubeinfo.tube,tbltubeinfo.size,
tblrepairs.id,tblrepairs.details,tblrepairs.statusofrepair,tblrepairs.datecompleted

FROM tblresidentdata 
JOIN tblimages ON tblresidentdata.id = tblimages.id 
JOIN tblchrist ON tblresidentdata.id = tblchrist.id
JOIN tbltubeinfo ON tblresidentdata.id = tbltubeinfo.id
LEFT JOIN tblrepairs ON tblresidentdata.id = tblrepairs.id
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
     $tubefed = $row['tubefed'];
   $baptised = $row['baptised'];
   $date = $row['date'];
   $baploc = $row['locale'];
   $priest = $row['priest'];
   $tubetype = $row['tube'];
   $tubesize = $row['size'];
   $details = $row['details'];
   $status = $row['statusofrepair'];
   $datecom = $row['datecompleted'];
   $repairid = $row['repairid'];
  }

  echo'
  <div id = "showInfo">
  <div class="container">
  
  <div class="resident-info">
      <div class="col-1">
          <div class="nav-btns">
              <button class="logout-btn" id ="prev"><i class="fas fa-arrow-circle-left"></i>Prev</button>
              <button class="logout-btn" id ="next">Next<i class="fas fa-arrow-circle-right"></i></button>
          </div>
          <div class="main-img">
          
              <img src='.$image1.' alt="" class = "main-image" id = "productImg">
          </div>
          <div class="small-images">
          <img src='.$image1.'alt="" class = "small-image">
          <img src='.$image2.' alt="" class = "small-image">
          <img src='.$image3.' alt="" class = "small-image">
          <img src='.$image4.'alt="" class = "small-image">
          </div>

          <fieldset>
          <legend>Repair Information</legend>
          <div class = "fieldset-info">
          '.(($repairid)?'<p><strong>Details: </strong>'.$details.'</p>
          <p><strong>Status: </strong>'.$status.'</p>
          <p><strong>Date Assigned: </strong>'.$datecom.'</p>': 
          '<h1 class = "heading-primary">No repair data!</h1>').'
          </div>
          </fieldset>
      </div>
      
      <div class="col-2">
      <div class="nav-btns">
              <button class="logout-btn" id="openmodal"><i class="far fa-file-pdf"></i> View Evalution Form</button>
              
          </div>
          
          <div class="resident-bio">
          <fieldset>
          <legend>Basic Data</legend>
          <div class = "fieldset-info">
          <p>Resident Name</p>
          <h1 class = "c-main-color">'.$firstname.' '.$lastname.'</h1>
          <p><strong>Location: </strong>'.$location.'</p>
          <p><strong>Approx Age: </strong>'.$age.'</p>
          <p><strong>Date of Birth: </strong>'.$dob.'</p>
          <p><strong>Parish of Birth: </strong>' .$parish.'</p>
          <p><strong>Sex: </strong>'.$gender.'</p>
          '.(($deceased == 'Deceased')?'<p class = "c-danger c-light"><strong>Status:</strong> '.$deceased.'</p>':'').'
              </div>
          </fieldset>

          <fieldset>
          <legend>Court Information</legend>
          <div class = "fieldset-info">
          <p><strong>Fit Person Order: </strong>'.$fpo.'</p>
          <p><strong>Date of Admission: </strong>'.$doa.'</p>
          </div>
          </fieldset>


          <fieldset>
          <legend>Diabilities</legend>
          <div class = "fieldset-info">
          <p><strong>Disabilities:</strong>'.$dis.'</p>
          </div>
          </fieldset>

          <fieldset>
          <legend>Other Information</legend>
          <div class = "fieldset-info">
          <p><strong>Tube Fed: </strong>'.$tubefed.'</p>
          <p><strong>Tube Type: </strong>'.$tubetype.'</p>
          <p><strong>Tube Size: </strong>'.$tubesize.'</p>
          <p><strong>Diaper Usage: </strong>10 per day</p>
          </div>
          </fieldset>

          <fieldset>
          <legend>Baptism Information</legend>
          <div class = "fieldset-info">
          <p><strong>Baptised: </strong>'.$baptised.'</p>
          <p><strong>Date Baptised: </strong>'.$date.'</p>
          <p><strong>Location: </strong>'.$baploc.'</p>
          <p><strong>Priest: </strong>'.$priest.'</p>
          </div
          </fieldset>

          
          
          </div>
      </div>
  </div>
    </div>
  </div>
  
  
    <div class="container modal"  id="modal">
        '.(($evalform)?'
        <button class="logout-btn" id="closemodal">Close Evaluation Form </button>
        <embed src='.$evalform.' style = "width:100%; height:150vh;" type="application/pdf">
        </embed>':'<button class="logout-btn" id="closemodal">Return to Profile</button>
        <h1 class = "heading-primary">No Evaluation Form for '.$firstname.' '.$lastname.'</h1>').'         
    </div>

  
  ';
     
}else{
    echo "<h1 class = 'heading-primary'>Error 1: Unable to fetch data!</h1>";
   }

   

}


?>

