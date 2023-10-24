<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_menu = $_POST['nama_menu'];
    $deskripsi_menu = $_POST['deskripsi_menu'];
    $harga_menu = $_POST['harga_menu'];
    $kategori = $_POST['kategori'];
    $gambar_menu = $_FILES['gambar_menu']['name'];
    $upload_folder = 'menupic/';

    if (move_uploaded_file($_FILES['gambar_menu']['tmp_name'], $upload_folder . $gambar_menu)) {
        $query = "INSERT INTO menu (nama_menu, deskripsi_menu, harga_menu, gambar_menu, kategori) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->execute([$nama_menu, $deskripsi_menu, $harga_menu, $gambar_menu, $kategori]);
        header("Location: admin.php");
    } else {
        echo "Upload foto gagal.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>
    <link rel="stylesheet" type="text/css" href="css/insert.css">
</head>
<body>
    <h1>Tambah Menu</h1>
    <form method="POST" enctype="multipart/form-data">
        <label>Nama Menu</label>
        <input type="text" name="nama_menu"><br>
        <label>Deskripsi Menu</label>
        <textarea name="deskripsi_menu"></textarea><br>
        <label>Harga Menu</label>
        <input type="text" name="harga_menu"><br>
        <label>Kategori</label>
        <select name="kategori" style="margin-bottom: 15px;">
            <option value="" disabled selected>Category</option>
            <option value="Pasta">Pasta</option>
            <option value="Pizza">Pizza</option>
            <option value="Soup">Soup</option>
            <option value="Vegetables">Vegetables</option>
            <option value="Appetizer">Appetizer</option>
            <option value="Dessert">Dessert</option>
            <option value="Drinks">Drinks</option>
        </select>
        <label>Gambar Menu</label>
        <input type="file" name="gambar_menu"><br>
        <input type="submit" value="Tambah">
    </form>
</body>
</html>
