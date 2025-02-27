<?php
session_start();

// Hardcoded login credentials
$valid_username = "TF";
$valid_password = "TF";

// Handle Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

// Handle Login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION["loggedin"] = true;
    } else {
        $error = "Invalid Username or Password!";
    }
}

// If user is logged in, show dashboard
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Dashboard</title>
        <style>
            body { font-family: Arial, sans-serif; text-align: center; padding: 50px; }
            a { text-decoration: none; color: red; font-size: 18px; }
        </style>
    </head>
    <body>
        <h2>Welcome, TF!</h2>
        <p>You are logged in successfully.</p>
        <a href="?logout=true">Logout</a>
    </body>
    </html>
<?php exit; endif; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 50px; }
        .login-box { width: 300px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        input { width: 90%; padding: 10px; margin: 10px 0; }
        button { padding: 10px; background: green; color: white; border: none; cursor: pointer; }
        .error { color: red; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
