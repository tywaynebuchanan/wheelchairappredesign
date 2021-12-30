<?php 
session_start();
require_once('dbconn/dbconn.php');
$link = '';

if(isset($_POST['submit']))
{
    if(empty($_POST['uname']) && empty($_POST['password']))
    {
        $_SESSION['message'] = "Username and Password cannot be blank";
    }else if(empty($_POST['uname'])){
        $_SESSION['message'] = "Username cannot be blank";
    } else if(empty($_POST['password']))
    {
        $_SESSION['message'] = "Password cannot be blank";
    }else{
        $username = $_POST['uname'];
        $password = sha1($_POST['password']);

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            return $data;
        }

        $username = validate($username);
        // $password = validate($password);

        $query = mysqli_query($conn, "SELECT * from tblusers where username = '$username' AND password = '$password'");
        $rows = mysqli_num_rows($query);
        $data = mysqli_fetch_array($query);

      
        $role = $data['role'];
        $isActive = $data['isActive'];
        $isChangedPassword = $data['IschangedPassword'];
        $passkey = $data['passKey'];
        $name = $data['firstname']."".$data['lastname'];
        
       
        if($role == 'Administrator' && $isActive == 'YES' )
        {
            $link = 'success.php';
        }else if($role == 'Viewer' && $isActive == 'YES' && $isChangedPassword == 'Yes')
        {
            $link = 'dashboard.php';
        }

        if($rows === 1)
        {
            $_SESSION['login_user'] = $username;
            $_SESSION['name'] = $name;
            header("Location:".$link."");

        }else{
            $_SESSION['message'] = "Incorrect Login information!";
            }
        mysqli_close($conn);
    }
}





?>