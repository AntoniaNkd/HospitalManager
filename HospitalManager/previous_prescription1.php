<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<?php
session_start();
if(!isset($_SESSION['email']))
{
	header('location: index.php');
}
include 'nav_pat.php';
?>
<style>
h1 {
    text-align: center;
    color:black;
    font-size: 100%;
}
h2 {
    text-align: center;
    color:black;
    font-size: 100%;
}
h3 {
    text-align: center;
    color:black;
    font-size: 100%;
}
h4 {
    text-align: center;
    color:black;
    font-size: 200%;
}
</style>
<body>
<?php

$name = $_GET['p_name'];
        $db = mysqli_connect('localhost', 'root', '', 'doctor_appointment');
        $query = "SELECT * FROM prescription WHERE pat_name='$name' ORDER BY `date`";
        $results = mysqli_query($db, $query);
    $prescription = [];
    if(mysqli_num_rows($results) == 0)
    {?>
        <h4>Sorry No Previous Prescriptions!!!</h4>
        <?php
    }
    else{
    while($p = mysqli_fetch_assoc($results))
{
    $prescription[]=$p;    
}
  foreach ($prescription as $p) {
?>
<h1><?php echo $p['doc_name']?></h1>
<h2><?php echo $p['doc_bio']?></h2>
<h2>Phone:<?php echo $p['doc_phone']?></h2>
<h3>Patient Name:<?php echo $p['pat_name'];?></h3>
<h3>Age:<?php echo $p['pat_age'];?></h3>
 <h3>Date:<?php echo $p['date'];?></h3>
<textarea type="text"  name="prescribe" style=" margin-left: 20%; font-family: Arial;font-size: 12pt; width:60vw; height:20vw;">
<?php echo $p['prescribe'];?>
</textarea>
<?php }
}
?>
</body>
</html>