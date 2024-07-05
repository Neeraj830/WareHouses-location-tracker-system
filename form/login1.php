<?php
include '../includes/db.php';
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $con = mysqli_connect('localhost','root','','warehouse_management');
    $sql = "SELECT * FROM users WHERE Username='$username'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['Password'])) {
            $_SESSION['username'] = $username;
            echo "Session set: " . $_SESSION['username']; // Debugging statement
            header('Location: ../index.php');
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }
}
?>