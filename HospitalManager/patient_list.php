<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<?php
session_start();
if(!isset($_SESSION['email']))
{
	header('location: index.php');
}
include 'nav_doc.php';

?>
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

<?php
$date = date("y-m-d");
//storing doctor id at x
$x = $_SESSION['id'];
$db = mysqli_connect('localhost', 'root', '', 'doctor_appointment');
$query = "SELECT * FROM list WHERE doc_id = $x AND `date` >= '$date' ORDER BY `date`,is_morning,`serial`";
$results = mysqli_query($db, $query);
    $results= mysqli_query($db, $query);
    $list = [];
    while($r = mysqli_fetch_assoc($results))
{
    $list[]=$r;
    
}
?>
	<table align="right" width="600" border="1" cellpadding="1">
  <tr>
  	<th>Serial No.</th>
    <th>Date</th>
    <th>Shift</th>
    <th>Patient Name</th>
    <th>Create Prescription</th>


  </tr>

<?php
  foreach ($list as $s) {
        echo"<tr>";
        echo"<td>".$s['serial']."</td>";
        echo"<td>".$s['date']."</td>";
        //showing morning
        if($s['is_morning'] == 0)
        {
        	echo"<td>Morning</td>";
        }
        //showing evening
               else if($s['is_morning'] == 1)
        {
        	echo"<td>Evening</td>";
        }
        echo"<td>".$s['pat_name']."</td>";
        ?>
        <td><a href="prescription.php?p_name=<?= $s['pat_name']?>&p_age=<?= $s['pat_age']?>&p_id=<?= $s['pat_id']?>">Prescription</a></td>
        <?php
    }
    ?> 
</table>
</body>
</html>

