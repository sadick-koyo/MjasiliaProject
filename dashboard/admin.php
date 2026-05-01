<?php
session_start();

include "../config.php";

// Total Users
$total_users = $conn->query("SELECT * FROM users")->num_rows;

// Total Projects
$total_projects = $conn->query("SELECT * FROM projects")->num_rows;

// Total Reports
$total_reports = $conn->query("SELECT * FROM reports")->num_rows;

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="container">

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>EMS Admin</h2>
<a href="admin.php">Dashboard</a>

<a href="../modules/construction.php">Construction</a>

<a href="../modules/mining.php">Mining</a>

<a href="../modules/metal.php">Metal Works</a>

<a href="../modules/technical.php">Technical Services</a>

<a href="#">Manage Users</a>

<a href="#">Reports</a>

<a href="../logout.php">Logout</a>
    </div>

    <!-- Main -->
    <div class="main">

        <div class="header">
            <h1>Welcome Admin</h1>
            <a href="#" class="btn">+ New Project</a>
        </div>

        <div class="cards">

            <div class="card">
                <h3>Total Users</h3>
                <p>28</p>
            </div>

            <div class="card">
                <h3>Active Projects</h3>
                <p>12</p>
            </div>

            <div class="card">
                <h3>Reports</h3>
                <p>45</p>
            </div>

            <div class="card">
                <h3>Pending Tasks</h3>
                <p>9</p>
            </div>

        </div>

    </div>

</div>

</body>
</html>
