<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_username = $_POST['new_username'];
    $new_password = $_POST['new_password'];

    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'portfolio';

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $new_username = $conn->real_escape_string($new_username);

    $salt = generateSalt();

    $hashed_password = crypt($new_password, $salt);

    $query = "INSERT INTO users (username, password) VALUES ('$new_username', '$hashed_password')";

    if ($conn->query($query) === TRUE) {
	   echo "<script>alert('Registration successful! Please login.');</script>";
    } else {
	   echo "<script>alert('Registration Error?');</script>";
    }

    $conn->close();
}

function generateSalt($length = 22)
{
    $charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789./';
    $salt = '';

    for ($i = 0; $i < $length; ++$i) {
        $salt .= $charset[mt_rand(0, 63)];
    }

    return $salt;
}
?>