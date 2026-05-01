<?php
session_start();
include "../config.php";

if(!isset($_SESSION['role'])){
    header("Location: ../login.php");
    exit();
}

$message = "";

if(isset($_POST['submit_report'])){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $submitted_by = $_SESSION['role'];

    $sql = "INSERT INTO reports(title,description,submitted_by)
            VALUES('$title','$description','$submitted_by')";

    if($conn->query($sql)){
        $message = "Report submitted successfully!";
    }else{
        $message = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Report</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="container">

<div class="sidebar">
<h2>Reports</h2>

<a href="admin.php">Dashboard</a>
<a href="add_report.php">Add Report</a>
<a href="view_reports.php">View Reports</a>
<a href="../logout.php">Logout</a>
</div>

<div class="main">

<h1>Submit Report</h1>

<form method="POST">

<input type="text" name="title" placeholder="Report Title" required><br><br>

<textarea name="description" placeholder="Report Description" required></textarea><br><br>

<button type="submit" name="submit_report" class="btn">Submit Report</button>

</form>

<p><?php echo $message; ?></p>

</div>

</div>

</body>
</html>
