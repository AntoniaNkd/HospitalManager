<?php 

$db = mysqli_connect('localhost', 'root', '', 'doctor_appointment');
    $query = "SELECT * FROM department ";
    $results= mysqli_query($db, $query);
?>
<!DOCTYPE html>
<html>
<head>
<style>
body {margin:0;}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
    top: 0;
    width: 100%;
    left: 0;
    font: verdana;
}
.li1 {
    float: left;
}
button {
    background-color: #156571;
    color: white;
    border: none;
    cursor: pointer;
    width: 100%;
}
li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 20px 20px;
    text-decoration: none;
}
li a:hover, .dropdown:hover .dropbtn {
    background-color:  #FFB90F;
}
li.dropdown {
    display: inline-block;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}
.dropdown-content a:hover {background-color: #f1f1f1}
.dropdown:hover .dropdown-content {
    display: block;
}
</style>
</head>
<body>

<ul>
  <li class="li1"><a href="patient_home.php">Home</a></li>
     <li class="li1"><a href="pat_edit.php">Edit Profile</a></li>
  <li class="dropdown li1">
    <a href="javascript:void(0)" class="dropbtn">Departments</a>
<!-- dropdown button for departments where departments are reading out from database -->
    <div class="dropdown-content">
       <?php 
while($dep=mysqli_fetch_assoc($results))
    {?>
       <a href="department.php?dep_id=<?= $dep['id'] ?>"> <?php echo $dep['department'];?> </a>
    <?php
    }?>
    </div>
  </li>
  <?php
  //getting patient name using session variable
   $pat_name = $_SESSION['username'];
  ?>
  <li class="li1"><a href="previous_prescription1.php?p_name=<?= $pat_name?>">Prescriptions</a></li>
  <?php
   if(isset($_SESSION['email'])){ ?>
 <li style=" float:right;" > <a class="link" href="logout.php" style="text-align:center">Logout</a></li>
<?php }
else{ 
    
    if(isset($_SESSION['email'])){?>
<li style=" float:right;" > <a class="link" href="logout.php" >Logout</a></li>
    <?php } else { ?>
    
  <li class="li1"><a class="link" href="login.php" style="text-align:center">Login</a></li>
<?php } } ?>
</ul>

</body>
</html>