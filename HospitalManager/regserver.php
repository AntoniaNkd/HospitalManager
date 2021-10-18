<?php
session_start();
// variable declaration
$username = "";
$email    = "";
$phone    = "";
$image = "";
$image_tmp = "";
$_SESSION['success'] = "";
$errors =array();
// connect to database
$db = mysqli_connect('localhost', 'root', '', 'doctor_appointment');
// REGISTER Doctor
if (isset($_POST['reg_sec'])) {
	// receive all input values from the form
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$phone = mysqli_real_escape_string($db, $_POST['phone']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
	$image = mysqli_real_escape_string($db, $_FILES['image']['name']);
	$type = mysqli_real_escape_string($db, $_POST['type']);
	if ($type == 3) {
		// form validation: ensure that the form is correctly filled
		if (empty($username)) {
			echo "<div class = 'error'>" ."Username is required". "</div>";
		}
		if (empty($email)) {
			echo "<div class = 'error'>" ."Email is required". "</div>";
		}
		if (empty($password_1)) {
			echo "<div class = 'error'>" ."Password is required". "</div>";
		}
		if ($password_1 != $password_2) {
			echo "<div class = 'error'>" ."Passwords do not match". "</div>";
		}
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1); //encrypt the password before saving in the database
			$query = "INSERT INTO secratary (username, email, phone, password, image) 
				  VALUES ('$username', '$email', '$phone', '$password', '$image')";
			$data = mysqli_query($db, $query);
			header('location: register.php');
			
		}
	} else if ($type == 1) {
		if (empty($username)) {
			echo "<div class = 'error'>" ."Username is required". "</div>";
		}
		if (empty($email)) {
			echo "<div class = 'error'>" ."Email is required". "</div>";
		}
		if (empty($password_1)) {
			echo "<div class = 'error'>" ."Password is required". "</div>";
		}
		if ($password_1 != $password_2) {
			echo "<div class = 'error'>" ."Passwords do not match". "</div>";
		}
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1); //encrypt the password before saving in the database
			$query = "INSERT INTO patient (username, email, phone, password, image) 
				  VALUES ('$username', '$email', '$phone', '$password', '$image')";
			$data = mysqli_query($db, $query);
			header('location: register.php');
			
		}
	}
}
?>