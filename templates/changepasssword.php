<body>
       <main>
           <section>
              <div class="login-container">
                  <div class="login-form">
                    <div class="title">
                        <?php if(!empty($_SESSION['message'])) {?>
                            <p class="error"><i class="fas fa-times"></i> <?php echo $_SESSION['message'];?></p>
                            <?php 
                                unset($_SESSION['message']);
                        } ?>
                        <h1 class="heading-primary">
                         Change Password
                        </h1>
                        <div class="form">
                            <form action="" method= "POST" >
                                <input type="password" name="newpassword" placeholder="New Password">
                                <input type="password" name="confirmpassword" placeholder="Confirm Password">
                              
                                <div class="submit">
                                    <input type="submit" name = "submit" class="submit-btn" value="Change Password">
                                </div>
                              
                            </form>

                            <div class="version">
                                <p class="text">Wheelchair Management System</p>
                                <p class="text">Version 1.1 December 2021</p>
                                <a href="logout.php">Logout</a>
                            </div>
                        </div>
                    </div>  
                  </div>
               
               
              </div>
           </section>
       </main>
    </body>
</html>