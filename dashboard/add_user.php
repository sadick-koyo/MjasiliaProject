<?php
session_start();
include "../config.php";

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}

$message = "";

if(isset($_POST['add_user'])){

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $sql = "INSERT INTO users(fullname,email,password,role)
            VALUES('$fullname','$email','$password','$role')";

    if($conn->query($sql)){
        $message = "User added successfully!";
    }else{
        $message = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add User</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="container">

<div class="sidebar">
<h2>Admin Panel</h2>

<a href="admin.php">Dashboard</a>
<a href="manage_users.php">Manage Users</a>
<a href="add_user.php">Add User</a>
<a href="../logout.php">Logout</a>
</div>

<div class="main">

<h1>Add New User</h1>

<form method="POST">

<input type="text" name="fullname" placeholder="Full Name" required><br><br>

<input type="email" name="email" placeholder="Email" required><br><br>

<input type="password" name="password" placeholder="Password" required><br><br>

<select name="role" required>
<option value="">Select Role</option>
<option value="admin">Admin</option>
<option value="manager">Manager</option>
<option value="site_manager">Site Manager</option>
<option value="staff">Staff</option>
</select><br><br>

<button type="submit" name="add_user" class="btn">Add User</button>

</form>

<p><?php echo $message; ?></p>

</div>

</div>

</body>
</html>
