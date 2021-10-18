<?php
session_start();
//getting patient name and age by using get method
$pat_name = $_GET['p_name'];
$pat_age = $_GET['p_age'];
$prescribe = " ";
$date = date("y-m-d");
//doctor name and bio and phone
$doc_name = $_SESSION['username'];
$doc_bio = $_SESSION['bio'];
$doc_phone = $_SESSION['phone'];
if(isset($_POST['_save']))
{
	$prescribe = $_POST['prescribe'];
}
// connect to database
$db = mysqli_connect('localhost', 'root', '', 'doctor_appointment');
		$query = "INSERT INTO prescription (pat_name, pat_age, doc_name, doc_bio, doc_phone, prescribe, `date`) 
				  VALUES('$pat_name', '$pat_age', '$doc_name', '$doc_bio', '$doc_phone', '$prescribe', '$date')";
		mysqli_query($db, $query);
		header('location: patient_list.php');
?>