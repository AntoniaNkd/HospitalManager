<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            margin: 0;
        }

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

        li a,
        .dropbtn {
            display: inline-block;
            color: white;
            text-align: left;
            padding: 20px 20px;
            text-decoration: none;
        }

        li a:hover,
        .dropdown:hover .dropbtn {
            background-color: #FFB90F;
        }

        li.dropdown {
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>

<body>

    <ul>
        <li class="li1"><a href="sec_home.php">Home</a></li>
        <li class="li1"><a href="sec_edit.php">Edit Profile</a></li>
        <li class="li1">
            <div class="dropdown">
                <button class="dropbtn">User List</button>
                <div class="dropdown-content">
                    <a href="patient_list_sec.php">Patient List</a>
                    <a href="doc_list_sec.php">Doctor List</a>
                    <a href="sec_list.php">Secretary List</a>
                </div>
            </div>
        </li>
        <li class="li1">
            <div class="dropdown">
                <button class="dropbtn">Activate Users</button>
                <div class="dropdown-content">
                    <a href="activationpat.php">Patients</a>
                    <a href="activationdoc.php">Doctors</a>
                    <a href="activationsec.php">Secretary</a>
                </div>
            </div>
            <li class="li1">
            <div class="dropdown">
                <button class="dropbtn">Edit Profiles</button>
                <div class="dropdown-content">
                    <a href="patient_profile.php">Patients</a>
                    <a href="doctor_profile.php">Doctors</a>
                    <a href="sec_profile.php">Secretary</a>
                </div>
            </div>


        </div>

        <?php

        if (isset($_SESSION['email'])) { ?>
            <li style=" float:right;"> <a class="link" href="logout.php" style="text-align:center">Logout</a></li>
            <?php } else {

            if (isset($_SESSION['email'])) { ?>
                <li style=" float:right;"> <a class="link" href="logout.php">Logout</a></li>



        <?php }
        } ?>
    </ul>

</body>

</html>