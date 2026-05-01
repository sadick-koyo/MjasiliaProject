
<?php include "config/db.php"; session_start(); ?>

<form method="POST">
    <h2>Login</h2>

    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>

    <button type="submit" name="login">Login</button>
</form>

<?php
if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            $_SESSION['user'] = $user;

            // redirect based on role
            if ($user['role'] == 'admin') {
                header("Location: dashboard/admin.php");
            } else {
                header("Location: dashboard/user.php");
            }

        } else {
            echo "Wrong password!";
        }

    } else {
        echo "User not found!";
    }
}
?>
