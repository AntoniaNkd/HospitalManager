<?php

session_start();

$db = mysqli_connect('localhost', 'root', '', 'doctor_appointment');
$date = $_POST['date'];
$morning = $_POST['m_app'];
$evening = $_POST['e_app'];
$doc_id= $_SESSION['id'];


if (isset($_POST['submit'])) {
		$query = "INSERT INTO schedule (doctor_id, `date`, morning_max, evening_max) 
				  VALUES($doc_id, '$date', '$morning', '$evening')";
		mysqli_query($db,$query);
		header('location: schedule.php');
}
?>