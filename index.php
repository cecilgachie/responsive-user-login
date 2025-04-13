<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>login pages</title>
</head>
<body>
    <div class="container">
        <div class="form-box active" id="logn-form">
            <form action="">
                <h2>login</h2>
                <input type="email" name="Email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" class="btn">login</button>
                <p class="login-register-text">Don't have an account? <a href="#" onclick="showForm('register-form')" class="register-link">Register here</a></p>
            </form>
        </div>

        <div class="form-box" id="register-form">
            <form action="">
                <h2>Register</h2>
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="Email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <select name="role" required>
                    <option value="" disabled selected>--Select role--</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                    <option value="guest">Guest</option>
                </select>
                <button type="submit" class="btn">Register</button>
                <p class="login-register-text">Already have an account? <a href="#" onclick="showForm('logn-form')" class="login-link">Login here</a></p>
            </form>
    </div>

    <script src="script.js"></script>
</body>
</html>