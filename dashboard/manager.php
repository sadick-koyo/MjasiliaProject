<?php
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'manager'){
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Manager Dashboard</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="container">

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Project Manager</h2>

        <a href="#">Dashboard</a>
        <a href="#">Create Project</a>
        <a href="#">Assign Staff</a>
        <a href="#">Progress Reports</a>
        <a href="#">Schedules</a>
        <a href="../logout.php">Logout</a>
    </div>

    <!-- Main -->
    <div class="main">

        <div class="header">
            <h1>Welcome Manager</h1>
            <a href="#" class="btn">+ Create Project</a>
        </div>

        <div class="cards">

            <div class="card">
                <h3>Projects</h3>
                <p>08</p>
            </div>

            <div class="card">
                <h3>Assigned Staff</h3>
                <p>34</p>
            </div>

            <div class="card">
                <h3>Reports</h3>
                <p>17</p>
            </div>

            <div class="card">
                <h3>Deadlines</h3>
                <p>05</p>
            </div>

        </div>

    </div>

</div>

</body>
</html>
