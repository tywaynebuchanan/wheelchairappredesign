<?php 
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
            header('Location: success.php');
            $_SESSION['msg-color'] = "success";
            $_SESSION['message'] = "Password Updated!.";
           
        }else{
            header('Location: success.php');
            $_SESSION['msg-color'] = "error";
            $_SESSION['message'] = "Password Failed";
        }
    }
}



?>