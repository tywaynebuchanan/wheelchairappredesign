<?php include('dbconn/dbconn.php'); 

if(isset($_POST['submit']))
    {
        $sql2 = mysqli_query($conn,"INSERT INTO `tbllogged`(`id`, `username`, `timeloggedin`, `timeloggedout`, `userid`) VALUES ('1','B','C','D','1')");
        if($sql2)
        {
            echo 'Success';
        }else{
            echo "error" . $conn->error;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="loggedin.php" method = "POST">
    <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>