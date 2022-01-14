<?php include('processes/summary.php');

$males = ['tblresidentdata','gender','Male'];
$residents = 'tblresidentdata';
$females = array('tblresidentdata','gender','Female');   
$wheelchair = ['tblresidentdata','wheelchairbound','Yes'];
$gender = ['Female','Male'];
$names = ['SP','MFH','GOH','JER','BA','WM','JL'];

function Totals($table,$col,$field){
    
    global $conn;
    $count = mysqli_query($conn, "SELECT * FROM $table WHERE $col = '$field' and status !='Deceased'");
    $res = mysqli_num_rows($count);
    echo $res;
}

function TotalNew($home){
    global $conn;
    $c = mysqli_query($conn, "SELECT * from tblresidentdata WHERE location1 = '$home' and status != 'Deceased'");
    $result = mysqli_num_rows($c);
    echo $result;
}
function WC($home){
    global $conn;
    $c = mysqli_query($conn, "SELECT * from tblresidentdata WHERE location1 = '$home' and wheelchairbound = 'Yes' AND
    status !='Deceased'");
    $result = mysqli_num_rows($c);
    echo $result;
}

function Gender($home,$gender){
    global $conn;
    $c = mysqli_query($conn, "SELECT * from tblresidentdata WHERE location1 = '$home' and gender = '$gender' and
    status !='Deceased'");
    $result = mysqli_num_rows($c);
    echo $result;
}


function res_count($table){
    global $conn;
    $count = mysqli_query($conn, "SELECT * FROM $table WHERE status !='Deceased'");
    $res = mysqli_num_rows($count);
    echo $res;
}



?>
<section class="section-info">

    <div class="container">
    <div class="boxes">
    <div class="box">
        <h3>Total Residents</h3>
        <i class="fas fa-users"></i>
        <?php res_count($residents);?></div>
        <div class="box">
        <h3>Total Males</h3>
        <i class="fas fa-male"></i>
        <?php Totals($males[0],$males[1],$males[2]);?>
   </div>


        <div class="box">
        <h3>Total Females</h3>
        <i class="fas fa-female"></i>
        <?php Totals($females[0],$females[1],$females[2]);?>  </div>

         <div class="box">
        <h3>Total in Wheelchairs</h3>
        <i class="fas fa-wheelchair"></i>
        <?php Totals($wheelchair[0],$wheelchair[1],$wheelchair[2]);?> </div>
    </div>
        

</div>

</section>

<section class="section-table">
    <div class="table-info container">
    <table>
        <thead>
            <tr>
                <td>Apostolates</td>
            <td># of Residents</td>
            <td># of Residents in WheelChair</td>
            <td># of Females</td>
            <td># of Males</td>
           
        
        </tr>
    </thead>
            
        <tbody>
            <tr><td><a class = "table-links" href = "viewlist.php?home=SP&location=Sophie's Place">Sophie's Place</a></td>
            <td><?php TotalNew($names[0]);?></td>
         <td><?php WC($names[0]);?></td>
         <td><?php Gender($names[0],$gender[0]);?></td>
         <td><?php Gender($names[0],$gender[1]);?></td></tr>

            <tr><td><a class = "table-links" href = "viewlist.php?home=MFH&location=My Father's House">My Father's House</a></td>
            <td><?php TotalNew($names[1]);?></td>
         <td><?php WC($names[1]);?></td>
         <td><?php Gender($names[1],$gender[0]);?></td>
         <td><?php Gender($names[1],$gender[1]);?></td></tr>
        </tr>
            <tr><td><a class = "table-links" href = "viewlist.php?home=GOH&location=Gift of Hope">Gift of Hope</a>
        </td> 
        <td><?php TotalNew($names[2]);?></td>
         <td><?php WC($names[2]);?></td>
         <td><?php Gender($names[2],$gender[0]);?></td>
         <td><?php Gender($names[2],$gender[1]);?></td></tr>
        </tr>
            <tr><td><a class = "table-links" href = "viewlist.php?home=JER&location=Jerusalem">Jerusalem</a></td>
            <td><?php TotalNew($names[3]);?></td>
         <td><?php WC($names[3]);?></td>
         <td><?php Gender($names[3],$gender[0]);?></td>
         <td><?php Gender($names[3],$gender[1]);?></td></tr>
        </tr>

    
        <tr><td><a class = "table-links" href = "viewlist.php?home=BA&location=Blessed Assurance">Blessed Assurance</a></td> 
        <td><?php TotalNew($names[4]);?></td>
         <td><?php WC($names[4]);?></td>
         <td><?php Gender($names[4],$gender[0]);?></td>
         <td><?php Gender($names[4],$gender[1]);?></td></tr>

         <tr><td><a class = "table-links" href = "viewlist.php?home=WM&location=Widow's Mite">Widow's Mite</a></td> 
         <td><?php TotalNew($names[5]);?></td>
         <td><?php WC($names[5]);?></td>
         <td><?php Gender($names[5],$gender[0]);?></td>
         <td><?php Gender($names[5],$gender[1]);?></td></tr>

         
         <tr><td><a class = "table-links" href = "viewlist.php?home=JL&location=Jacob's Ladder">Jacob's Ladder</a></td> 
         <td><?php TotalNew($names[6]);?></td>
         <td><?php WC($names[6]);?></td>
         <td><?php Gender($names[6],$gender[0]);?></td>
         <td><?php Gender($names[6],$gender[1]);?></td></tr>
    

</tr>


        </tbody>
    </table>
    </div>    
</section>
