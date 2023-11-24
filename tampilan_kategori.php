<?php
if (!isset($_SESSION['nama'])) {
    header('location: ../index.php'); // Redirect to the login page if not logged in
    exit();
}
include '../config/koneksi.php';
$level = $_SESSION['level'];
$edit_hapus_visible = true;

if ($level == 2) {
    // Penentuan Hak Akses tautan edit dan hapus harus terlihat berdasarkan level pengguna
    $edit_hapus_visible = false;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tampilan Kategori</title>
    <link rel="stylesheet" href="../Config/table.css">
</head>

<body>
    <h2>Pemrograman 1 Siti Hawasih 2023</h2>
    <br>
    <?php if ($level == 1 || $level == 4): ?>
        <a href="?page=lkategori">+ Tambah Kategori</a>
    <?php endif; ?>
    <br>
    <table border="1" class="styled-table">
        <tr>
            <th>Id</th>
            <th>Nama Kategori</th>
            <th>Diskon</th>
            <?php if ($edit_hapus_visible): ?>
                <th>Opsi</th>
            <?php endif; ?>
        </tr>
        <?php
        include '../config/koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "select * from kategori");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['nama_kategori']; ?></td>
                <td><?php echo $d['diskon']; ?></td>
                <?php if ($edit_hapus_visible): ?>
                    <td>
                        <?php if ($level == 1 || $level == 4): ?>
                            <a href="edit_kategori.php?id=<?php echo $d['id_kategori']; ?>">Edit</a>
                            <a href="hapus_kategori.php?id=<?php echo $d['id_kategori']; ?>">Hapus</a>
                        <?php elseif ($level == 3): ?>
                            <a href="edit_kategori.php?id=<?php echo $d['id_kategori']; ?>">Edit</a>
                        <?php endif; ?>
                    </td>
                <?php endif; ?>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>
