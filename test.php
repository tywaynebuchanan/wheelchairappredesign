<?php include('dbconn/dbconn.php');



if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $cp = $_POST['cp'];
    $mri = $_POST['mri'];
    // $sp = $_POST['mr'];
    // $mri = $_POST['mri'];

    $query = mysqli_query($conn,"INSERT INTO tblvalue (d,d1) VALUES('$cp','$mri')");
    if($query)
    {
        echo "<script> alert('SUccess')</script>";

    }else{
        echo "<script>alert('failed')</script>";
    }

   
}

$query1 = mysqli_query($conn, "SELECT * FROM tblvalue");
$res = mysqli_fetch_assoc($query1);

if($res_qu->num_rows > 0){
    while ($row = mysqli_fetch_assoc($res_query))
{
while($row = $res){
    $d = $row['d'];
    $d1 = $row['d1'];
}
echo $d.''.$d1;
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


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
<input type="checkbox" name="cp" id="" value = "cp"><label>CP</label>
<input type="radio" name="mri" id="" value = "mri"><label>MRI</label>
<!-- <input type="radio" name="sd" id="" value = "sd"><label>Seizure Palsy</label>
<input type="radio" name="mp" id="" value = "mp"><label>M P</label> -->

<input type="submit" value="Submit">
</form>

</body>
</html>