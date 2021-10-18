<!DOCTYPE html>
<html>
<head><title>Doctor Appointment System</title>
<link rel="stylesheet" type="text/css" href="style.css"></head>
<style>

body
{
    background-image:url("background.jpg");
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
<body>

<?php
include ('server.php');
$role = " ";

if(!isset($_SESSION['username']))
{
	include 'nav_home.php';
}
else
{
	if($_SESSION['role']=="patient")
	{
		include 'nav_pat.php';
	}
    else if($_SESSION['role']=="doctor")
    	{
    		include 'nav_doc.php';
		}
	else
		{
			include 'nav_sec.php';
		}
}
 


 ?>
</body>
<html>