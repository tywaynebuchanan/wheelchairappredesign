<?php 
include('sessions/session.php');
include('templates/header.php');
include('templates/admin.nav.php');
include('templates/hero.php');
if($_GET){
    echo "<div class ='container'>
    <div class = 'modal-content hideMessage'>
    ".$_GET['message']."
    </div>
    </div>";   
    
}

passwordReset();
activeUser();

$query = mysqli_query($conn, "SELECT * FROM tblusers ");
$count_users = mysqli_num_rows($query);


?>

<div class="back-btn">
  <a href="adduser.php" class="logout-btn"><i class="fas fa-user"></i> Add User</a>
  <div class="btn-end">
  <p><strong>User Count:</strong> <?php echo $count_users?></p>
  </div>
</div>

<section class="section-table">
    <div class="table-info container">
        <table>
            <thead>
                <tr>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Role</td>
                    <!-- <td>Time Logged In</td>
                    <td>Time Logged Out</td> -->
                    <td>Active</td>
                    <td colspan="3">Action</td>
                </tr>
            </thead>

<?php 

  

    if($query->num_rows > 0){
        while($row = mysqli_fetch_assoc($query))
        {
           
            $username = $row['username'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $password = $row['password'];
            $role = $row['role'];
            // $timein = $row['timeloggedin'];
            // $timeout = $row['timeloggedout'];
            $active = $row['isActive'];
            // $id = $row['id'];
           
            echo'  <tbody>
            <tr>
                <td>'.$firstname.'</td>
                <td>'.$lastname.'</td>
                <td>'.$role.'</td>
                <td>'.$active.'</td>
                <td>
                <div class = "tooltip">
                <span class="tooltiptext">Change Password</span>
                <a href="admin.function.php?username='.$username.'"><i class="fas fa-key"></i></a>
                </div>
                
                </td>
                <td>
                <div class = "tooltip">
                <span class="tooltiptext">Active User</span>
                <a href="admin.function.php?username='.$username.'">
                '.(($active =='YES')?'<i class="fas fa-user-plus c-s"></i>.':'<i class="fas fa-user-minus c-d"></i>').'
                </a>
                </div>
                
                </td>
                </td>
                <td>
                <div class = "tooltip">
                <span class="tooltiptext">Edit User</span>
                <a href="admin.edit.php?username='.$username.'"><i class="fas fa-user-edit"></i></a>
                </div>
                </td>
            </tr>
        </tbody>';
        }
    }else{
        echo 'No records found';
    }


?>  

        


        </table>
    </div>
</section>

<?php include('templates/footer.php');?>