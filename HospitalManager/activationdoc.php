<!DOCTYPE html>
<html>
<head><title>Activation</title></head>
<link rel="stylesheet" type="text/css" href="style.css">
<?php
include('server.php');
include 'nav_sec.php'; ?>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
        float: right;
    }

    th {
        text-align: center;
        padding: 12px;
        background-color: #FFB90F;
        color: white;
    }

    td {
        text-align: center;
        padding: 12px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2
    }

    .button {
        background-color: #FFB90F;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
</style>

<body>


    <?php

    $query = "SELECT id, email, status FROM doctor WHERE status='Inactive' ";
    $select = mysqli_query($db, $query);
    $list = [];
    while ($r = mysqli_fetch_assoc($select)) {
        $list[] = $r;
    }
    ?>
    <table align="right" width="600" border="1" cellpadding="1">
        <tr>
            <th>Details</th>
            <th>Status</th>


        </tr>

        <?php
        $status = '';
        foreach ($list as $s) {
            echo "<tr>";
            echo "<td>" . $s['email'] . "</td>";
            echo "<td>"?> <a href="actiondoc.php?status=<?php echo $s['id']; ?>" class="act" onclick="return confirm('Activate <?php echo $s['email'] ?> ? ');"> Activate </a> </td> 
                
        <?php
        }
        ?>

    </table>
</body>

</html>