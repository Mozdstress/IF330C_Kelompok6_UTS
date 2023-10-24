<?php
session_start();
require_once('db.php');

$loggedIn = (isset($_SESSION['user_id'])) ? true : false;

// Cek apakah pengguna memiliki peran 'admin'
if ($loggedIn) {
    $user_id = $_SESSION['user_id'];
    $query = "SELECT role FROM users WHERE user_id = :user_id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row['role'] !== 'admin') {
        header('Location: index.php');
        exit;
    }
} else {
    header('Location: login.php');
    exit;
}

$query = "SELECT * FROM menu";
$result = $db->query($query);
?>

<!DOCTYPE html>
<html>

<head>
    <link href="css/admin.css" rel="stylesheet" />
    <title>Admin Page</title>
</head>

<body>
    <nav>
        <div class="navbar">
            <div class="logo">
                <img src="images/logo.png" alt="Logo">
                <span class="non-selectable-text">Admin Page</span>
            </div>
            <div class="menu">
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </nav>


    <div class="header-container">
        <button class="insert_btn" onclick="location.href='insert.php'">Insert Menu Baru</button>
        <div class="menu-categories">
          <button class="filter-button" data-category="all">All</button>
          <button class="filter-button" data-category="Pasta">Pasta</button>
          <button class="filter-button" data-category="Pizza">Pizza</button>
          <button class="filter-button" data-category="Soup">Soup</button>
          <button class="filter-button" data-category="Vegetables">Vegetables</button>
          <button class="filter-button" data-category="Appetizer">Appetizer</button>
          <button class="filter-button" data-category="Dessert">Dessert</button>
          <button class="filter-button" data-category="Drinks">Drinks</button>
        </div>
    </div>

    <table id="menu-table" class="table-container">
        <thead>
            <tr>
                <th>ID</th>
                <th>Gambar Menu</th>
                <th>Nama Menu</th>
                <th>Deskripsi Menu</th>
                <th>Harga Menu</th>
                <th>Kategori</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) : ?>
                <tr class="<?= $row['kategori']; ?>">
                    <td><?php echo $row['id']; ?></td>
                    <td>
                        <img src="menupic/<?= $row['gambar_menu'] ?>" width="50" height="50">
                    </td>
                    <td><?php echo $row['nama_menu']; ?></td>
                    <td><?php echo $row['deskripsi_menu']; ?></td>
                    <td><?php echo $row['harga_menu']; ?></td>
                    <td><?php echo $row['kategori']; ?></td>
                    <td>
                        <button class="edit_btn" onclick="window.location.href='edit.php?id=<?= $row['id'] ?>'">Edit</button>
                        <form method="POST" action="delete.php">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button class="delete_btn" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <script>
    const filterButtons = document.querySelectorAll(".filter-button");
    const menuTable = document.getElementById("menu-table");
    const rows = menuTable.querySelectorAll("tr");
    const headerRow = rows[0];

    filterButtons.forEach(button => {
        button.addEventListener("click", () => {
            const category = button.getAttribute("data-category");
            filterMenuByCategory(category);
        });
    });

    function filterMenuByCategory(category) {
        const rows = menuTable.querySelectorAll("tr");
        rows.forEach(row => {
            if (category === "all" || row.classList.contains(category)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }
</script>

</body>

</html>