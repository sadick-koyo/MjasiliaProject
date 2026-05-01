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
</head>
<body>

<div class="container">

<div class="sidebar">
<h2>Reports</h2>

<a href="add_report.php">Add Report</a>
<a href="view_reports.php">View Reports</a>
<a href="../logout.php">Logout</a>
</div>

<div class="main">

<h1>All Reports</h1>

<?php while($row = $result->fetch_assoc()){ ?>

<div class="card">

<h3><?php echo $row['title']; ?></h3>
<p><?php echo $row['description']; ?></p>

<small>
By: <?php echo $row['submitted_by']; ?> |
Date: <?php echo $row['created_at']; ?>
</small>

</div>

<br>

<?php } ?>

</div>

</div>

</body>
</html>
