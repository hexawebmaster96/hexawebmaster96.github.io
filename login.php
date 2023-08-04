<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'portfolio';

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $conn->real_escape_string($username);

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        if (verifyPassword($password, $hashed_password)) {
            session_start();
            $_SESSION['username'] = $username;
            header('Location: welcome.php');
            exit();
        } else {
            echo "Invalid password. Please try again.";
        }
    } else {
        echo "Invalid username. Please try again.";
    }

    $conn->close();
}

function verifyPassword($password, $hashed_password)
{
    return crypt($password, $hashed_password) === $hashed_password;
}
?>