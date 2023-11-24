<?php
// Periksa apakah pengguna sudah masuk
if (!isset($_SESSION['nama'])) {
    header('location: ../index.php'); // Redirect ke halaman login jika belum masuk
    exit();
}

include 'koneksi.php';
$level = $_SESSION['level'];
$edit_hapus_visible = false;

// Penentuan Hak Akses tautan edit hapus yang disesuaikan berdasarkan level tersebut yang akan ditampilkan. 
if ($level == 1 || $level == 3 || $level == 4) {
    $edit_hapus_visible = true;
}

$levelMapping = [
    1 => 'Admin',
    2 => 'Staff',
    3 => 'Supervisor',
    4 => 'Manager'
];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tampilan User</title>
    <link rel="stylesheet" href="../Config/table.css">
</head>

<body>
    <h2>Pemrograman 1 Siti Hawasih 2023</h2>
    <br>
    <?php if ($edit_hapus_visible): ?>
        <a href="?page=luser">+ Tambah User</a>
    <?php endif; ?>
    <br>
    <table border="1" class="styled-table">
        <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Password</th>
            <th>Level</th>
            <th>Status</th>
            <?php if ($edit_hapus_visible): ?>
                <th>Opsi</th>
            <?php endif; ?>
        </tr>
        <?php
        include '../config/koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM user");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['password']; ?></td>
                <td><?php echo $levelMapping[$d['level']]; ?></td>
                <td><?php echo $d['status']; ?></td>
                <?php if ($edit_hapus_visible): ?>
                    <td>
                        <?php if ($level == 1): ?>
                            <a href="edit_user.php?id=<?php echo $d['id_user']; ?>">Edit</a>
                            <a href="hapus_user.php?id=<?php echo $d['id_user']; ?>">Hapus</a>
                        <?php elseif ($level == 3): ?>
                            <a href="edit_user.php?id=<?php echo $d['id_user']; ?>">Edit</a>
                        <?php elseif ($level == 4): ?>
                            <a href="edit_user.php?id=<?php echo $d['id_user']; ?>">Edit</a>
                            <a href="hapus_user.php?id=<?php echo $d['id_user']; ?>">Hapus</a>
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

