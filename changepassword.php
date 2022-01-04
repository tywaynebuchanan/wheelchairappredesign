<?php include('sessions/session.php');
include('templates/header.php');
include('templates/navbar.php');

if(isset($_POST['submit']))
{
    if(empty($_POST['newpassword']) && empty($_POST['confirmpassword']))
    {
        $_SESSION['message'] = 'Password fields can not be blank';
    }else {
       
        function validate($data)
        {
            $data = stripslashes($data);
            $data = trim($data);
            return $data;
        }
        $newpassword = validate($_POST['newpassword']);
        $confirmpassword = validate($_POST['confirmpassword']);
        $confirmpassword = sha1($_POST['confirmpassword']);
        $query = mysqli_query($conn, "SELECT * FROM tblusers WHERE username = '$login_session'");
        $rows = mysqli_fetch_array($query);

        if($rows > 0)
        {
            $update_query = mysqli_query($conn, "UPDATE tblusers set password = '$confirmpassword', IschangedPassword = 'Yes' WHERE username = '$login_session'");
            header('Location: myaccount.php');
            $_SESSION['msg-color'] = "success";
            $_SESSION['message'] = "Password Updated!.";
           
        }else{
            header('Location: myaccount.php');
            $_SESSION['msg-color'] = "error";
            $_SESSION['message'] = "Password Failed";
        }
    }
}
?>
<body>
       <main>
       <section class="section-hero">
            <div class="hero">
                <div class="container">
                    <h1 class="heading-primary"><?php echo $name?></h1>
                </div>
            </div>
        </section>

           <section class = "section-change-p">
               <div class="change-p-form">
               <?php if(!empty($_SESSION['message'])) {?>
                <p class="error"><i class="fas fa-times"></i> <?php echo $_SESSION['message'];?></p>
                <?php 
                   unset($_SESSION['message']);
                    } ?>
                        <h1 class="heading-primary">
                         Change Password
                        </h1>
                        <div class="change-form">
                            <form action="" method="post">
                                <div class="change-row">
                                    <input type="password" name="newpassword" id="" class="contact-input" placeholder="New Password">
                                    <input type="password" name="confirmpassword" id="" class="contact-input" placeholder="Confirm Password">
                                </div>
                                <div class="change-row">
                                    <p class="text">Password must be a minimum of 8 characters long with at least one uppercase letter, one lowercase letter and one number.</p>
                                </div>
                                <div class="change-row">
                                    <a href="myaccount.php" class="submit-btn c-danger">Cancel</a>
                                    <input type="submit" value="Save Changes" name = "submit" class="submit-btn c-main">
                                   
                                </div>
                            </form>
                       </div>
               </div>
           </section>
       </main>
    </body>
    <?php include("templates/footer.php")?>
</html>





