
<?php
include "config.php";

$message = "";

if(isset($_POST['register'])){

    $fullname = $_POST['fullname'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role     = $_POST['role'];

    $sql = "INSERT INTO users(fullname,email,password,role)
            VALUES('$fullname','$email','$password','$role')";

    if($conn->query($sql) === TRUE){
        $message = "User Registered Successfully!";
    }else{
        $message = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register User</title>
</head>
<body>

<h2>Create User Account</h2>

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

    <button type="submit" name="register">Register</button>
</form>

<p><?php echo $message; ?></p>

</body>
</html>
