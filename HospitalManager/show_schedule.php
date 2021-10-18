<?php

session_start();
if(!isset($_SESSION['email']))
{
	header('location: index.php');
}
include 'nav_doc.php';
?>
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
table {
    border-collapse: collapse;
    width: 100%;
    float: right;
}

th {
    text-align: center;
    padding: 12px;
    background-color: #FFB90F;
    color: white;
}
td {
    text-align: center;
    padding: 12px;
}

tr:nth-child(even)
{background-color: #f2f2f2}
.button {
    background-color: #FFB90F; 
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
</head>
	<body>
    <?php 
    //showing schedule from current date to available date by selecting doctor id
    $startdate =  date("Y-m-d");
    $x=$_SESSION['id'];
  $db = mysqli_connect('localhost', 'root', '', 'doctor_appointment');
    $query = "SELECT * FROM schedule WHERE doctor_id = $x AND`date` >= '$startdate'";
    $results= mysqli_query($db, $query);
    $schedule = [];
    while($r = mysqli_fetch_assoc($results))
{
    $schedule[]=$r;
    
}
?>
	<table align="right">
    <table width="600" border="1" cellpadding="1">
  <tr>
    <th>Date</th>
    <th>Morning Shift<br>Appoinments</th>
    <th>Evening Shift<br>Appoinments</th>
  </tr>

<?php
  foreach ($schedule as $s) {
      $_SESSION['date'] = $s['date'];
        echo"<tr>";
        echo"<td>".$s['date']."</td>";
        echo"<td>".$s['morning_max']."</td>";
        echo"<td>".$s['evening_max']."</td>";
    }
    ?>
  
</table>
</body>
</html>