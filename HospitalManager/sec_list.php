<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<?php
session_start();
if(!isset($_SESSION['email']))
{
	header('location: index.php');
}

include 'nav_sec.php';
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

$x = $_SESSION['id'];
$db = mysqli_connect('localhost', 'root', '', 'doctor_appointment');
$query = "SELECT id, username, email, phone FROM secratary ";
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
  	<th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>


  </tr>

<?php
  foreach ($list as $s) {
        echo"<tr>";
        echo"<td>".$s['id']."</td>";
        echo"<td>".$s['username']."</td>";
        echo"<td>".$s['email']."</td>";
        echo"<td>".$s['phone']."</td>";
        ?>
        <?php
    }
    ?> 
</table>
</body>
</html>

