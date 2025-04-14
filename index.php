<?php

session_start();

$errors = [
    'login_error' => isset($_SESSION['login_error']) ? $_SESSION['login_error'] : null,
    'register_error' => isset($_SESSION['register_error']) ? $_SESSION['register_error'] : null,
];
$active_form = isset($_SESSION['active_form']) ? $_SESSION['active_form'] : 'logn-form';

session_unset();

function showError($error) {
    return !empty($error) ? "<div class='error'>$error</div>" : '';
}

fuction isActiveForm($formName, $active_form) {
    return $formName === $active_form ? 'active' : '';
}
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
        <div class="form-box <?= isActiveFotm('login', $activeform); ?>" id="logn-form">
            <form action="login-register.php" method="post">
                <h2>login</h2>
                <?= showError($errors['login_error']) ?>
                <input type="email" name="Email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" class="btn">login</button>
                <p class="login-register-text">Don't have an account? <a href="#" onclick="showForm('register-form')" class="register-link">Register here</a></p>
            </form>
        </div>

        <div class="form-box" <?= isActiveFotm('register', $activeform); ?> id="register-form">
            <form action="login-register.php" method="post">
                <h2>Register</h2>
                <?= showError($errors['register_error']) ?>
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
