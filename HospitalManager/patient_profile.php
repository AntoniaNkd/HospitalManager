
<center>
    <?php
    include ("server.php");
    include ("nav_sec.php");
    ?>
    
<head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style type="text/css">
    .input-group select {
    height: 40px;
    width: 100%;
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid gray;
    background-color: #FFB90F;
    
}
</style>
    
    <?php 
    if (isset($_GET['submit'])) {
    $id = $_GET['id'];
    $username = $_GET['username'];
    $password = $_GET['password'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    $query = "UPDATE patient SET username='$username', email='$email', phone='$phone', password='$password' WHERE id='$id'";
    $data = mysqli_query($db, $query);
    }
    $query1 = "SELECT * FROM patient";
    $data1 = mysqli_query($db, $query1);
    while ($row = mysqli_fetch_array($data1)) {
    echo "<div class= 'btn' style = 'width: 50px;'><a href='patient_profile.php?update={$row['id']}'>{$row['username']}</a></div>";
    echo "<br />";
    }
    ?>
    <?php
    if (isset($_GET['update'])) {
    $update = $_GET['update'];
    $query2 = "SELECT * FROM patient WHERE id= $update";
    $data2 = mysqli_query($db, $query2);
    while ($row = mysqli_fetch_array($data2)) {
        echo "<b><a href='patient_profile.php?update={$row['id']}'>{$row['username']}</a></b>";
        echo "<br />";
    }
    ?>

    <?php
                                if (isset($_GET['update'])) {
                                    $update = $_GET['update'];
                                    $query2 = "SELECT * FROM patient WHERE id= $update";
                                    $data2 = mysqli_query($db, $query2);
                                    while ($row = mysqli_fetch_array($data2)) {
                                        
                                        echo "<form class='form' method='get'>";
                                        echo "<h2>Update Form</h2>";
                                        echo "<hr/>";
                                        echo "<input class='input-group' type='hidden' name='id' value='{$row['id']}' />";
                                        echo "<br />";
                                        echo "<input class='input' type='hidden' name='password' value='{$row['password']}' />";
                                        echo "<br />";
                                        echo "<label>" . "Name:" . "</label>" . "<br />";
                                        echo "<input class='input-group' type='text' name='username' value='{$row['username']}' />";
                                        echo "<br />";
                                        echo "<label>" . "Email:" . "</label>" . "<br />";
                                        echo "<input class='input' type='text' name='email' value='{$row['email']}' />";
                                        echo "<br />";
                                        echo "<label>" . "Phone:" . "</label>" . "<br />";
                                        echo "<input class='input' type='text' name='phone' value='{$row['phone']}' />";
                                        echo "<br />";
                                       
                                        echo "<input class='btn' type='submit' name='submit' value='update' />";
                                        echo "</form>";
                                    }
                                }
                                if (isset($_GET['btn'])) {
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


    
    