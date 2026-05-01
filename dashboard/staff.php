<?php
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'staff'){
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Staff Dashboard</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="container">

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Staff Panel</h2>

        <a href="#">Dashboard</a>
        <a href="#">My Tasks</a>
        <a href="#">Submit Report</a>
        <a href="#">Schedule</a>
        <a href="#">Messages</a>
        <a href="../logout.php">Logout</a>
    </div>

    <!-- Main -->
    <div class="main">

        <div class="header">
            <h1>Welcome Staff</h1>
            <a href="#" class="btn">+ Submit Report</a>
        </div>

        <div class="cards">

            <div class="card">
                <h3>My Tasks</h3>
                <p>06</p>
            </div>

            <div class="card">
                <h3>Completed</h3>
                <p>19</p>
            </div>

            <div class="card">
                <h3>Reports</h3>
                <p>07</p>
            </div>

            <div class="card">
                <h3>Messages</h3>
                <p>03</p>
            </div>

        </div>

    </div>

</div>

</body>
</html>
