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
    <title>Tampilan Member</title>
    <link rel="stylesheet" href="../Config/table.css">
</head>

<body>
    <h2>Pemrograman 1 Siti Hawasih 2023</h2>
    <br>
    <?php if ($level == 1 || $level == 4): ?>
        <a href="?page=lmember">+ Tambah Member</a>
    <?php endif; ?>
    <br>
    <table border="1" class="styled-table">
        <tr>
            <th>Id</th>
            <th>Nama Member</th>
            <th>Level</th>
            <?php if ($edit_hapus_visible): ?>
                <th>Opsi</th>
            <?php endif; ?>
        </tr>
        <?php
        include '../Config/koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "select * from member");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['nama_member']; ?></td>
                <td><?php echo $d['level']; ?></td>
                <?php if ($edit_hapus_visible): ?>
                    <td>
                        <?php if ($level == 1 || $level == 4): ?>
                            <a href="edit_penjualan.php?id=<?php echo $d['id_member']; ?>">Edit</a>
                            <a href="hapus_penjualan.php?id=<?php echo $d['id_member']; ?>">Hapus</a>
                        <?php elseif ($level == 3): ?>
                            <a href="edit_penjualan.php?id=<?php echo $d['id_member']; ?>">Edit</a>
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
