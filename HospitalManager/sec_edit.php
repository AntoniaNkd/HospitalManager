<center>
    <?php
    include ("server.php");
    include ("nav_sec.php");
    ?>
    
<head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

    
    <?php 
    if (isset($_GET['submit'])) {
    $id = $_GET['id'];
    $username = $_GET['username'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    $password = $_GET['password'];
    $newpassword = $_GET['newpassword'];
    if($password == $newpassword)
    {
    $new_password = md5($password);
    $query = "UPDATE secratary SET username='$username', email='$email', phone='$phone', password='$new_password' WHERE id='$id'";
    $data = mysqli_query($db, $query);
    }
    else{
        echo "<div class = 'error'>" ."Two passwords do not match"."</div>" ; 
    }
    }
    
    $id = $_SESSION['id'];
    $query1 = "SELECT * FROM secratary WHERE id=$id";
    $data1 = mysqli_query($db, $query1);
    while ($row = mysqli_fetch_array($data1)) {
    echo "<div class= 'btn' style = 'width: 50px;'><a href='sec_edit.php?update={$row['id']}'>{$row['username']}</a></div>";
    echo "<br />";
    }
    ?>
    <?php
    if (isset($_GET['update'])) {
    $update = $_GET['update'];
    $query2 = "SELECT * FROM secratary WHERE id= $update";
    $data2 = mysqli_query($db, $query2);
    while ($row = mysqli_fetch_array($data2)) {
        echo "<b><a href='sec_edit.php?update={$row['id']}'>{$row['username']}</a></b>";
        echo "<br />";
    }
    ?>

    <?php
                                if (isset($_GET['update'])) {
                                    $update = $_GET['update'];
                                    $query2 = "SELECT * FROM secratary WHERE id= $update";
                                    $data2 = mysqli_query($db, $query2);
                                    while ($row = mysqli_fetch_array($data2)) {
                                        
                                        echo "<form class='form' method='get'>";
                                        echo "<h2>Update Form</h2>";
                                        echo "<hr/>";
                                        echo "<input class='input' type='hidden' name='id' value='{$row['id']}' />";
                                        echo "<br />";
                                        echo "<label>" . "Name:" . "</label>" . "<br />";
                                        echo "<input class='input' type='text' name='username' value='{$row['username']}' />";
                                        echo "<br />";
                                        echo "<label>" . "Email:" . "</label>" . "<br />";
                                        echo "<input class='input' type='text' name='email' value='{$row['email']}' />";
                                        echo "<br />";
                                        echo "<label>" . "Phone:" . "</label>" . "<br />";
                                        echo "<input class='input' type='text' name='phone' value='{$row['phone']}' />";
                                        echo "<br />";
                                        echo "<label>" . "New Password:" . "</label>" . "<br />";
                                        echo "<input class='input' type='password' name='password'  />";
                                        echo "<br />";
                                        echo "<label>" . "Confirm New Password:" . "</label>" . "<br />";
                                        echo "<input class='input' type='password' name='newpassword'  />";
                                        echo "<br />";
                                        echo "<input class='btn' type='submit' name='submit' value='update' />";
                                        echo "</form>";
                                    }
                                }
                                if (isset($_GET['submit'])) {
                                    echo '<div class="form" id="form3"><br><br><br><br><br><br>
        <Span>Data Updated Successfuly......!!</span></div>';
                                }
                                ?>
                                <?php
    }?>
            
    <?php
                
    mysqli_close($db);
    ?>
</center>


    