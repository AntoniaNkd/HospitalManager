<?php
include('server.php');
if (isset($_GET['status'])) {
    $status1 = $_GET['status'];
    $query = "SELECT * FROM secratary WHERE id='$status1'";
    $select = mysqli_query($db, $query);
    while ($row = mysqli_fetch_all($select)) {
        $status_var = $row['status'];
        if ($status_var == 'Inactive') {
            $status_state = 'Active';
        } else {
            $status_state = 'Active';
        }
        $query = "UPDATE secratary SET status='$status_state' WHERE id='$status1' ";
        $update = mysqli_query($db, $query);
        if ($update) {
            header("Location:activationsec.php");
        }
    }
?>
<?php
}
?>