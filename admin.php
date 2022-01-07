<?php 
include('sessions/session.php');
include('templates/admin.nav.php');
include('templates/hero.php');
include('templates/header.php');

?>

<section class="section-table">
    <div class="table-info container">
        <table>
            <thead>
                <tr>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Password</td>
                    <td>Role</td>
                    <td>Time Logged In</td>
                    <td>Time Logged Out</td>
                    <td>Active</td>
                    <td colspan="3">Action</td>
                </tr>
            </thead>

<?php 

    $query = mysqli_query($conn, 
    "SELECT tblusers.id,tblusers.username,tblusers.firstname,tblusers.lastname,tblusers.password,tblusers.role
    ,tblusers.isActive,tbllogged.username,tbllogged.timeloggedin,tbllogged.timeloggedout,tbllogged.userid FROM tblusers 
    LEFT JOIN tbllogged ON tblusers.id = tbllogged.userid");

    if($query->num_rows > 0){
        while($row = mysqli_fetch_assoc($query))
        {
           
            $username = $row['username'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $password = $row['password'];
            $role = $row['role'];
            $timein = $row['timeloggedin'];
            $timeout = $row['timeloggedout'];
            $active = $row['isActive'];
            // $id = $row['id'];
            echo'  <tbody>
            <tr>
                <td>'.$firstname.'</td>
                <td>'.$lastname.'</td>
                <td><input type ="password" class = "pass" value ='.$password.' disabled></td>
                <td>'.$role.'</td>
                <td>'.((!empty($timein))?date("Y-m-d h:i:sa"):"Not logged in").'</td>
                <td>'.((!empty($timeout))?date("Y-m-d h:i:sa"):"Not Logged out").'</td>
                <td>'.$active.'</td>
                <td>
                <div class = "tooltip">
                <span class="tooltiptext">Change Password</span>
                <a href="admin.changepassword.php?username='.$username.'"><i class="fas fa-key"></i></a>
                </div>
                
                </td>
                <td>
                <div class = "tooltip">
                <span class="tooltiptext">Active User</span>
                <a href="admin.changepassword.php?username='.$username.'">
                '.(($active =='YES')?'<i class="fas fa-user-plus c-s"></i>.':'<i class="fas fa-user-minus c-d"></i>').'
                </a>
                </div>
                
                </td>
                </td>
                <td>
                <div class = "tooltip">
                <span class="tooltiptext">Edit User</span>
                <a href="admin.edit.php?iusername='.$username.'"><i class="fas fa-user-edit"></i></a>
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