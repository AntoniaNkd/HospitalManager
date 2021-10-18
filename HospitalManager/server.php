<?php
session_start();
$errors = array();
$_SESSION['success'] = "";
$status = '';
$db = mysqli_connect('localhost', 'root', '', 'doctor_appointment');
// LOGIN USER
if (isset($_POST['login_user'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	if (empty($email)) {
		echo "<div class = 'error'>" ."Email is required"."</div>" ; 
	}
	if (empty($password)) {
		echo  "<div class = 'error'>" ."Password is required"."</div>" ;
	}

	
	$type = $_POST['type'];
	if ($type == 1) {

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM patient WHERE email='$email' AND password='$password'";
			$results = mysqli_query($db, $query);
			$row = mysqli_fetch_assoc($results);
			if (mysqli_num_rows($results) == 1 && $row['status'] == 'Active') {
				$_SESSION['email'] = $email;
				$_SESSION['password'] = $password;
				$_SESSION['status'] = $status;
				$_SESSION['id'] = $row['id'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['phone'] = $row['phone'];
				$_SESSION['age'] = $row['age'];
				$_SESSION['status'] = $row['status'];
				$_SESSION['image'] = $row['image'];
				$_SESSION['role'] = "patient";
				header('location: patient_home.php');
				
			}
			else if(mysqli_num_rows($results) == 1 && $row['status'] == 'Inactive')
			{
				echo "<div class = 'error'>" ."Your account is Inactive"."</div>";
			}
			else {
				echo "<div class = 'error'>" ."Wrong email/password combination"."</div>";
			}
		}	
	}
	
	else if ($type == 2) {

			if (count($errors) == 0) {
				$password = md5($password);
			$query = "SELECT * FROM doctor WHERE email='$email' AND password='$password' ";
			$results = mysqli_query($db, $query);
			$row = mysqli_fetch_assoc($results);
				if (mysqli_num_rows($results) == 1 && $row['status'] == 'Active') {
					$_SESSION['email'] = $email;
					$_SESSION['password'] = $password;
					$_SESSION['status'] = $status;
					$_SESSION['id'] = $row['id'];
					$_SESSION['username'] = $row['username'];
					$_SESSION['phone'] = $row['phone'];
					$_SESSION['bio'] = $row['bio'];
					$_SESSION['status'] = $row['status'];
					$_SESSION['role'] = "doctor";
					$_SESSION['image'] = $row['image'];
					header('location: doctor_home.php');
					
				}
				else if(mysqli_num_rows($results) == 1 && $row['status'] == 'Inactive')
				{
					echo "<div class = 'error'>" ."Your account is Inactive"."</div>";
				}
			else{
					echo "<div class = 'error'>" ."Wrong email/password combination"."</div>";
			}
	}
	}
	else if ($type == 3) {

			if (count($errors) == 0) {
				$password = md5($password);
			$query = "SELECT * FROM secratary WHERE email='$email' AND password='$password'";
			$results = mysqli_query($db, $query);
			$row = mysqli_fetch_assoc($results);
				if (mysqli_num_rows($results) == 1 && $row['status'] == 'Active') {
					$_SESSION['email'] = $email;
					$_SESSION['password'] = $password;
					$_SESSION['status'] = $status;
					
					$_SESSION['id'] = $row['id'];
					$_SESSION['username'] = $row['username'];
					$_SESSION['phone'] = $row['phone'];
					$_SESSION['status'] = $row['status'];
					$_SESSION['image'] = $row['image'];
					$_SESSION['role'] = "secratary";
					$_SESSION['image'] = $row['image'];
					header('location: sec_home.php');
					
				}
				else if(mysqli_num_rows($results) == 1 && $row['status'] == 'Inactive')
				{
					echo "<div class = 'error'>" ."Your account is Inactive"."</div>";
				}
				else {
					echo "<div class = 'error'>" ."Wrong email/password combination"."</div>";
		}
	}
	}
}?>