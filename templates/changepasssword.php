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
                                  <a href="success.php" class="cancel-btn">Back</a>
                                </div>
                              
                            </form>
                        </div>
                    </div>  
                  </div>
               
               
              </div>
           </section>
       </main>
    </body>
</html>