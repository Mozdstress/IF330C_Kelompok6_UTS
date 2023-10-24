<?php
session_start();
include 'db.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM menu WHERE id=?";
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    header('Location: admin.php');
    exit;
} else {
    header('Location: admin.php');
    exit;
}
?>
