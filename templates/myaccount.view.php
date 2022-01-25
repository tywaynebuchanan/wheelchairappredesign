<section class="section-hero">
            <div class="hero">
                <div class="container">
                    <h1 class="heading-primary"><?php echo $name?></h1>
                </div>
            </div>
</section>
<div>
   
</div>
<section class="myaccount">
            <div class="options">
                <h1 class="heading-primary">My Account</h1>
                <div class="option-btn">
                <a href="changepassword.php" class="link-btn c-main">Change Password</a>
                <a href="dashboard.php" class="link-btn c-main"><i class="fas fa-home"></i>Home</a>
                </div>
            </div>
            <div class="user-info">
                <p><strong>Username: </strong><?php echo $name?></p>
                <p><strong>Role</strong> <?php echo $role?></p>
                <p><strong>Last Login in:</strong> <?php echo (date("F d, Y H:i:s",$time1));?></p>
                <p><strong>Last Login Out:</strong> <?php echo (date("F d,Y H:i:s",$time2));?></p>
            </div>
</section>




       