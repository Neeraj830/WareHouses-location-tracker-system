<?php include '../includes/db.php'; ?>
<?php
$con = mysqli_connect('localhost','root','','warehouse_management');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO `users`(`Username`, `Email`, `Password`) VALUES ('$username', '$email', '$password')";

    if ($con->query($sql) === TRUE) {
        echo "<script>
    alert('Registration successfull');
    window.location.href='login.php';
    </script>
    ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <form action="register.php" method="post" enctype="multipart/form-data" >
            <h2>Register</h2>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
