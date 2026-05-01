<?php
session_start();
include "../config.php";

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}

// Delete user
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $conn->query("DELETE FROM users WHERE id=$id");
    header("Location: manage_users.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Users</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="container">

<div class="sidebar">
<h2>Admin Panel</h2>
<a href="admin.php">Dashboard</a>
<a href="manage_users.php">Manage Users</a>
<a href="../logout.php">Logout</a>
</div>

<div class="main">

<h1>Users List</h1>

<table border="1" cellpadding="10" style="background:#1e293b; width:100%; color:white;">
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Role</th>
<th>Action</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM users");

while($row = $result->fetch_assoc()){
?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['fullname']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['role']; ?></td>
<td>
<a href="manage_users.php?delete=<?php echo $row['id']; ?>" style="color:red;">Delete</a>
</td>
</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>
