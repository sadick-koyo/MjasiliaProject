<?php
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'manager'){
    header("Location: ../login.php");
    exit();
}
?>

<h1>Welcome Project Manager</h1>
<ul>
<li>Create Projects</li>
<li>Assign Staff</li>
<li>Track Progress</li>
</ul>

<a href="../logout.php">Logout</a>
