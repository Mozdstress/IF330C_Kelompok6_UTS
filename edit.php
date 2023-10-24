<?php
include 'db.php';

$row = ['id' => '', 'gambar_menu' => '', 'nama_menu' => '', 'harga_menu' => '', 'deskripsi_menu' => '', 'kategori' => ''];

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM menu WHERE id=?";
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama_menu = $_POST['nama_menu'];
    $harga_menu = $_POST['harga_menu'];
    $deskripsi_menu = $_POST['deskripsi_menu'];
    $kategori = $_POST['kategori'];
    $gambar_menu = $_FILES['gambar_menu']['name'];
    $upload_folder = 'menupic/';

    if (!empty($gambar_menu)) {
        if (move_uploaded_file($_FILES['gambar_menu']['tmp_name'], $upload_folder . $gambar_menu)) {
            $query = "UPDATE menu SET nama_menu=?, harga_menu=?, deskripsi_menu=?, kategori=?, gambar_menu=? WHERE id=?";
            $stmt = $db->prepare($query);
            $stmt->execute([$nama_menu, $harga_menu, $deskripsi_menu, $kategori, $gambar_menu, $id]);
            header("Location: admin.php");
        } else {
            echo "Upload foto gagal.";
        }
    } else {
        $query = "UPDATE menu SET nama_menu=?, harga_menu=?, deskripsi_menu=?, kategori=? WHERE id=?";
        $stmt = $db->prepare($query);
        $stmt->execute([$nama_menu, $harga_menu, $deskripsi_menu, $kategori, $id]);
        header("Location: admin.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Menu</title>
    <link rel="stylesheet" type="text/css" href="css/edit.css">
</head>
<body>
    <h1>Edit Data Menu</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $row['id']; ?>">
        <label>Nama Menu</label>
        <input type="text" name="nama_menu" value="<?= $row['nama_menu']; ?>"><br>
        <label>Deskripsi Menu</label>
        <textarea name="deskripsi_menu"><?= $row['deskripsi_menu']; ?></textarea><br>
        <label>Harga menu</label>
        <input type="text" name="harga_menu" value="<?= $row['harga_menu']; ?>"><br>
        <label>Kategori</label>
        <input type="text" name="kategori" value="<?= $row['kategori']; ?>"><br>
        <label>Gambar Menu</label>
        <input type="file" name="gambar_menu"><br>
        <img src="menupic/<?= $row['gambar_menu']; ?>" width="50" height="50">
        <input type="submit" value="Simpan">
    </form>
</body>
</html>
