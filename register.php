<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $contact_no = $_POST['contact_no'];

    $sql = "INSERT INTO users (email, username, password, contact_no) VALUES ('$email', '$username', '$password', '$contact_no')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful. <a href='login.php'>Login here</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Register</h2>
    <form method="post" action="register.php">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <label for="contact_no">Contact No:</label>
        <input type="text" name="contact_no" required>
        <button type="submit">Register</button>
    </form>
</body>
</html>
