<?php
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
</head>
<body>

<h1>Welcome Admin</h1>

<ul>
    <li>Manage Users</li>
    <li>View Reports</li>
    <li>System Settings</li>
    <li>Projects Overview</li>
</ul>

<a href="../logout.php">Logout</a>

</body>
</html>
