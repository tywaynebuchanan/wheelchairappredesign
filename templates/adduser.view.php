
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
                            <form action="adduser.php" method="post">

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
                                    <input type="submit" value="Save Changes" name = "submit" class="submit-btn c-main">
                                   
                                </div>
                            </form>
                       </div>
               </div>
           </section>
       

   
</main>
