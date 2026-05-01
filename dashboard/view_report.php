<?php
session_start();
include "../config.php";

if(!isset($_SESSION['role'])){
    header("Location: ../login.php");
    exit();
}

$result = $conn->query("SELECT * FROM reports ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>View Reports</title>
<link rel="stylesheet" href="../assets/css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<div class="container">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>Reports</h2>

        <a href="admin.php">Dashboard</a>
        <a href="add_report.php">Add Report</a>
        <a href="view_reports.php">View Reports</a>

        <hr>

        <a href="../modules/construction.php">Construction</a>
        <a href="../modules/mining.php">Mining</a>
        <a href="../modules/metal.php">Metal Works</a>
        <a href="../modules/technical.php">Technical</a>

        <hr>

        <a href="../logout.php">Logout</a>
    </div>

    <!-- MAIN -->
    <div class="main">

        <div class="header">
            <h1>All Reports</h1>
            <a href="add_report.php" class="btn">+ Add Report</a>
        </div>

        <?php while($row = $result->fetch_assoc()){ ?>

        <div class="card" style="margin-bottom:15px;">

            <h3><?php echo $row['title']; ?></h3>

            <p style="line-height:1.6;">
                <?php echo $row['description']; ?>
            </p>

            <div style="margin-top:10px; font-size:13px; color:#94a3b8;">
                By: <?php echo $row['submitted_by']; ?> |
                Date: <?php echo $row['created_at']; ?>
            </div>

        </div>

        <?php } ?>

    </div>

</div>

</body>
</html>
