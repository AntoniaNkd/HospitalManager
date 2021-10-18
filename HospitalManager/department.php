<?php
session_start();
if(!isset($_SESSION['username']))
{
	header('index.php');
}
include 'nav_pat.php';

$x = $_GET['dep_id'];
$db = mysqli_connect('localhost', 'root', '', 'doctor_appointment');
	$query = "SELECT * FROM doctor WHERE department_id = $x";
	$results= mysqli_query($db, $query);
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Departments</title>
	
</head>
<style type="text/css">
	.th{
		background-color: #FFB90F;
	}
</style>

<body>
<table width="600" border="1" cellpadding="1" >
<tr>
<th>Name</th>
<th>Email</th>
<th>Bio</th>
<th>Appointment</th>
<tr>
<?php 
while($doctor=mysqli_fetch_assoc($results))
{
	echo"<tr>";
	echo"<td>".$doctor['username']."</td>";
		echo"<td>".$doctor['email']."</td>";
		echo"<td>".$doctor['bio']."</td>";
		?>
		<td><a href="appointment.php?doc_id=<?= $doctor['id'] ?>">Appointment</a></td>
		<?php
		echo"</tr>";
}
?>
</body>
</html>