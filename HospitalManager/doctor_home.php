<?php

 include ('server.php');
 include ('docserver.php');
if(!isset($_SESSION['email']))
{
  header('location: index.php');
}
include ('nav_doc.php');
 ?> 
<html>
<head><title>Home</title></head>
<link rel="stylesheet" type="text/css" href="style.css">

<body>
<img src='<?php echo $_SESSION['image']; ?>' style="width:250px;height:250px;" ><br>
</body>

</html>
<?php
echo "NAME : ",$_SESSION['username'],"<br><br>";
echo "BIO : ",$_SESSION['bio'],"<br><br>";
echo "EMAIL : ",$_SESSION['email'],"<br><br>";
echo "PHONE : ",$_SESSION['phone'],"<br><br>";
?>
