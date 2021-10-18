<?php

// variable declaration
$username = "";
$email    = "";
$phone    = "";
$department    = "";
$bio    = "";
$image = "";
$image_tmp = "";
$_SESSION['success'] = "";
$errors = array();
// connect to database
$db = mysqli_connect('localhost', 'root', '', 'doctor_appointment');
// REGISTER Doctor
if (isset($_POST['reg_doc'])) {
	// receive all input values from the form
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$phone = mysqli_real_escape_string($db, $_POST['phone']);
	$bio = mysqli_real_escape_string($db, $_POST['bio']);
	$department = mysqli_real_escape_string($db, $_POST['department']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$image = mysqli_real_escape_string($db, $_FILES['image']['name']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) {
		echo "<div class = 'error'>" ."Username is Required"."</div>";
	}
	if (empty($email)) {
		echo "<div class = 'error'>" ."Email is Required"."</div>";
	}
	if (empty($bio)) {
		echo "<div class = 'error'>" ."Bio is Required"."</div>";
	}
	if (empty($password_1)) {
		echo "<div class = 'error'>" ."Password is Required"."</div>";
	}
	if ($password_1 != $password_2) {
		echo "<div class = 'error'>" ."Passwords do not match". "</div>";
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1); //encrypt the password before saving in the database
		$query = "INSERT INTO doctor (username, email, phone, department_id, bio, password, image) 
				  VALUES('$username', '$email', '$phone', '$department', '$bio', '$password', '$image')";
		$data = mysqli_query($db, $query);
		header('location: doctor_home.php');
	}
}
