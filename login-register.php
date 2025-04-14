<?php

session_start(); // Start the session
require_once 'config.php'; // Include the database configuration file

if (isset($_POST['register']) ) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password']; PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $checkEmail = $conn->query("SELECT email FROM users WHERE email = '$email'");
    if ($checkEmail->num_rows >0) {
        $_SESSION['register_error'] = "Email already exists!";
        $_SESSION['active_form'] = 'register-form';
    } else {
        $conn->query("INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')");
    }

    header("Location: index.php"); // Redirect to the login page
    exit();
}


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];

            if ($user['role'] == 'admin') {
                header("Location: admin.php"); // Redirect to admin page

            }else {
                header("Location: user.php"); // Redirect to user page
            }
            exit();
        }
    }
}

$_SESSION['login_error'] = "Invalid email or password!";
$_SESSION['active_form'] = 'logn-form';
header("Location: index.php"); // Redirect to the login page
exit();