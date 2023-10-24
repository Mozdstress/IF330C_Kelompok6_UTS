<?php
require_once('db.php');

// Data from FORM
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$birthdate = $_POST['birthdate'];
$gender = $_POST['gender'];
$role = $_POST['role'];

// Encrypt the PASSWORD
$en_pass = password_hash($password, PASSWORD_BCRYPT);

// SQL Query
$sql = "INSERT INTO users (first_name, last_name, username, email, password, birthdate, gender, role)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

// Execute Query
$result = $db->prepare($sql);
$result->execute([$first_name, $last_name, $username, $email, $en_pass, $birthdate, $gender, $role]);

// Redirect to login.php
header('Location: login.php');
?>
