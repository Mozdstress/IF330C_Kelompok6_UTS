<?php
session_start();
require_once('db.php');

// Data from FORM
$username = $_POST['username'];
$password = $_POST['password'];

// Verify the CAPTCHA
require "captcha.php";
$PHPCAP = new Captcha();
if (!$PHPCAP->verify($_POST["captcha"])) {
    $_SESSION['login_error'] = "CAPTCHA does not match";
    header("Location: login.php");
    exit;
}

// Check if user exists
$sql = "SELECT * FROM users 
        WHERE username = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$username]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    // User not found in the database
    $_SESSION['login_error'] = "Username not found";
    header("Location: login.php");
} else {
    // Check if password correct
    if (!password_verify($password, $row['password'])) {
        $_SESSION['login_error'] = "Wrong password";
        header("Location: login.php");
    } else {
        // Login success, set SESSION DATA
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        header('Location: index.php');
    }
}
?>



