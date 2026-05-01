<?php
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'staff'){
    header("Location: ../login.php");
    exit();
}
?>

<h1>Welcome Staff</h1>
<ul>
<li>My Tasks</li>
<li>Submit Report</li>
<li>View Schedule</li>
</ul>

<a href="../logout.php">Logout</a>
