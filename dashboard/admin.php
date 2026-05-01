<?php
session_start();
include "../config.php";

// Security: admin only
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}

// REAL DATA FROM DATABASE
$total_users = $conn->query("SELECT * FROM users")->num_rows;
$total_projects = $conn->query("SELECT * FROM projects")->num_rows;
$total_reports = $conn->query("SELECT * FROM reports")->num_rows;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<div class="container">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>EMS Admin</h2>

        <a href="admin.php">Dashboard</a>
        <a href="manage_users.php">Manage Users</a>
        <a href="add_user.php">Add User</a>

        <hr>

        <a href="../modules/construction.php">Construction</a>
        <a href="../modules/mining.php">Mining</a>
        <a href="../modules/metal.php">Metal Works</a>
        <a href="../modules/technical.php">Technical</a>

        <hr>

        <a href="../logout.php">Logout</a>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main">

        <div class="header">
            <h1>Admin Dashboard</h1>
        </div>

        <!-- STATS CARDS -->
        <div class="cards">

            <div class="card">
                <h3>Total Users</h3>
                <p><?php echo $total_users; ?></p>
            </div>

            <div class="card">
                <h3>Projects</h3>
                <p><?php echo $total_projects; ?></p>
            </div>

            <div class="card">
                <h3>Reports</h3>
                <p><?php echo $total_reports; ?></p>
            </div>

            <div class="card">
                <h3>System Status</h3>
                <p>Active</p>
            </div>

        </div>

        <!-- CHART SECTION -->
        <div style="margin-top:40px; background:#1e293b; padding:20px; border-radius:15px;">

            <h2>System Analytics</h2>

            <canvas id="myChart"></canvas>

        </div>

    </div>

</div>

<!-- CHART SCRIPT -->
<script>
const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Users', 'Projects', 'Reports'],
        datasets: [{
            label: 'Overview',
            data: [
                <?php echo $total_users; ?>,
                <?php echo $total_projects; ?>,
                <?php echo $total_reports; ?>
            ],
            backgroundColor: ['#38bdf8', '#22c55e', '#f97316']
        }]
    },
    options: {
        responsive: true
    }
});
</script>

</body>
</html>
