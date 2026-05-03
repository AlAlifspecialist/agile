<?php
include("config/db.php");
session_start();

$error = "";

if(isset($_POST['login'])){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM users 
            WHERE Email='$email' 
            AND PasswordHash='$password' 
            AND IsActive=1";

    $result = $conn->query($sql) or die($conn->error);

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();

        $_SESSION['UserID'] = $user['UserID'];
        $_SESSION['Email'] = $user['Email'];

        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid email or password";
    }
}
?>

<h2>Login</h2>

<?php
if($error != ""){
    echo "<p style='color:red;'>$error</p>";
}
?>

<form method="POST">
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit" name="login">Login</button>
</form>

<br>
<a href="register.php">Create new account</a>