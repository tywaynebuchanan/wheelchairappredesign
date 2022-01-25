<?php
include('sessions/session.php');
include('templates/header.php');
include('templates/admin.nav.php');



if(isset($_POST['submit']))
{
   $firstname = mysqli_escape_string($conn,$_POST['firstname']);
   $lastname = mysqli_escape_string($conn,$_POST['lastname']);
   $username = mysqli_escape_string($conn,$_POST['username']);
   $password = mysqli_escape_string($conn,$_POST['password']);
   $conpassword = mysqli_escape_string($conn,$_POST['confirmpassword']);
   $role = mysqli_escape_string($conn,$_POST['role']);
   $active = mysqli_escape_string($conn,$_POST['active']);

   $conpassword = sha1($_POST['confirmpassword']);
   $query = mysqli_query($conn, "INSERT into tblusers (username,password,firstname,lastname,role,
   IschangedPassword,isActive,home) 
   VALUES('$username','$conpassword','$firstname','$lastname','$role','YES','$active','MFH')") or die($query->error);

if ($query) {

    header("Location: admin.php?message=User information was added");
    
  } else {
    header("Location: admin.php?message=Unable to add user!");
  }

  $conn->close();
}


?>

<main>
    <section class="section-hero">
        <div class="hero">
            <div class="container">
             <h1 class="heading-primary">Add a User</h1>
            </div>
        </div>
    </section>
        
    <section class = "section-change-p">
               <div class="change-p-form">
               <?php if(!empty($_SESSION['message'])) {?>
                <p class="<?php echo $_SESSION['msg-color'];?>"><i class="fas fa-times"></i> <?php echo $_SESSION['message'];?></p>
                <?php 
                   unset($_SESSION['message']);
                    } ?>
                        <div class="change-form">
                            <form action="adduser.php" method="POST">

                                <div class="change-row">
                                
                                    <input type="text" name="firstname" id="" class="contact-input" placeholder="First Name">
                                    <input type="text" name="lastname" id="" class="contact-input" placeholder="Last Name">
                                    <input type="email" name="username" id="" class="contact-input" placeholder="Username">
                                </div>
                                <div class="change-row">
                                <input type="password" name="password" id="" class="contact-input" placeholder="Password">
                                <input type="password" name="confirmpassword" id="" class="contact-input" placeholder="Confirm Password">
                                </div>
                                <small>Password should have 1 upper case, one lower case</small>
                                <div>
                                    <label for="">Role and Activity</label>
                                </div>
                                <div class="change-row">
                                    <select name="role" id="role">
                                    <option value="">--SELECT ONE--</option>
                                        <option value="Viewer">Viewer</option>
                                        <option value="Administrator">Administrator</option>
                                        <option value="Superuser">Superuser</option>
                                    </select>
                                    
                                    <select name="active" id="">
                                        <option value="">--SELECT ONE--</option>
                                        <option value="YES">YES</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                               
                                <div class="change-row">
                                    <a href="admin.php" class="submit-btn c-danger">Cancel</a>
                                    <input type="submit"  name = "submit" value="Save Changes"class="submit-btn c-main">
                                   
                                </div>
                            </form>
                       </div>
               </div>
           </section>
       

   
</main>

<?php include('templates/footer.php');?>
