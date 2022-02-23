<?php 
include('sessions/session.php');
include('templates/header.php');
include('templates/navbar.php');
$id = $_GET['edit'];
$home = $_GET['home'];
$location = $_GET['location'];

$simple = mysqli_query($conn,"SELECT * from tblresidentdata WHERE id = '$id'");

if($simple->num_rows > 0){
    while ($row = mysqli_fetch_assoc($simple))
  {
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $gender = $row['gender'];
        $dob = $row['dob'];
        $parish = $row['parish'];
        $fpo = $row['fpo'];
        $doa = $row['doa'];
        $status = $row['status'];
  }
}

?>
<main>
    <section class="section-hero">
        <div class="hero">
            <div class="container">
             <h1 class="heading-primary">Edit <?php echo $firstname.' '.$lastname?></h1>
            </div>
        </div>
    </section>

    
<div class="back-btn" id = "backbtn">
<a href = <?php echo 'viewresidents.php?id='.$id.'&home='.$home.'&location='.$location.''?> class="logout-btn">
<i class="fas fa-arrow-circle-left"></i> Back</a>
</div>
        
    <section class = "section-editres">
               <div class="change-p-form">
               <?php if(!empty($_SESSION['message'])) {?>
                <p class="<?php echo $_SESSION['msg-color'];?>"><i class="fas fa-times"></i> <?php echo $_SESSION['message'];?></p>
                <?php 
                   unset($_SESSION['message']);
                    } ?>
                        <div class="change-form">
                            <form action="editres.php" method="POST">
                            <h1 class="heading-primary">Basic Info</h1>
                                <div class="form-control">
                                    
                                    <div class="field">
                                        <label for="fname">First Name</label>
                                        <div class="control">
                                        <input type="text" name="fname" id="fname" value="<?php echo $firstname?>">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="fname">Last Name</label>
                                        <div class="control">
                                        <input type="text" name="lname" id="lname" value="<?php echo $lastname?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-control">
                                <div class="field">
                                        <label for="gender">Gender</label>
                                        <div class="control">
                                        <select name="gender" id="gender">
                                        <?php 
                                            if($gender == 'Male')
                                            {
                                                echo '<option value ='.$gender.'>'.$gender.'</option>
                                                <option value = "Female">Female</option>';
                                            }else{
                                                echo '<option>'.$gender.'</option>
                                                <option value = "Male">Male</option>';
                                            }
                                             ?>
                                             </select>
                                    </div>
                                    </div>

                                    <div class="field">
                                        <label for="dob">Date of Birth</label>
                                        <div class="control">
                                        <input type="text" class = "disabled"name="dob" id="dob" value ="<?php echo $dob?>" disabled>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <label for="parish">Parish of Birth</label>
                                        <div class="control">
                                        <input type="text" name="paris" id="parish" value ="<?php echo $parish?>">
                                        </div>
                                    </div>
                                </div>

                                <h1 class="heading-primary">Court Information</h1>
                                <div class="form-control">
                                            
                                <div class="field">
                                        <label for="fpo">First Person Order</label>
                                        <div class="control">
                                        <input type="text" class = "disabled"name="fpo" id="fpo" value="<?php echo $fpo?>" disabled>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label for="fname">Date of Admission</label>
                                        <div class="control">
                                        <input type="text" class="disabled" name="lname" id="lname" value="<?php echo $doa?>" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="change-row">
                                <a href = <?php echo 'viewlist.php?home='.$home.'&location='.$location.''?> class="submit-btn c-danger">Cancel</a>
                                    <!-- <a href="viewlist.php?home='.$home.'&location='.$location.'" class="submit-btn c-danger">Cancel</a> -->
                                    <input type="submit"  name = "submit" value="Save Changes"class="submit-btn c-main">
                                   
                                </div>  
                            </form>
                       </div>
               </div>
           </section>
<?php 

                
include('templates/footer.php');


?>