<?php
session_start();
if(!isset($_SESSION['email']))
{
    header('location: index.php');
}
include 'nav_doc.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Schedule</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
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
    <div class="header">
        <h2>Schedule</h2>
    </div>
    
    <form method="post" action="schedule_db.php">
      <div class="input-group" id="date">
            <label>Date</label>
            <input type="Date" name="date" >
        </div>
        
        <div class="input-group" id="m_app">
            <label>Morning Appointment No.</label>
            <input type="number" name="m_app">
        </div>
        <div class="input-group" id="e_app">
            <label>Evening Appointment No.</label>
            <input type="number" name="e_app">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="submit">Submit</button>
        </div>
    </form>

</body>
</html>