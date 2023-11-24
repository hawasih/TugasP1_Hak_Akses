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
    <title>Tampilan Transaksi</title>
    <link rel="stylesheet" href="../Config/table.css">
</head>

<body>
    <h2>Pemrograman 1 Siti Hawasih 2023</h2>
    <br>
    <?php if ($level == 1 || $level == 4): ?>
        <a href="?page=ltransaksi">+ Tambah Transaksi</a>
    <?php endif; ?>
    <br>
    <table border="1" class="styled-table">
        <tr>
            <th>Id</th>
            <th>Tanggal Transaksi</th>
            <th>No Transaksi</th>
            <th>Jenis Transaksi</th>
            <th>Id Penjualan</th>
            <th>Id Barang</th>
            <th>Jumlah Transaksi</th>
            <th>Id Member</th>
            <th>Total</th>
            <?php if ($edit_hapus_visible): ?>
                <th>Opsi</th>
            <?php endif; ?>
        </tr>
        <?php
        include '../config/koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "Select * From transaksi");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['tgl_transaksi']; ?></td>
                <td><?php echo $d['no_transaksi']; ?></td>
                <td><?php echo $d['jenis_transaksi']; ?></td>
                <td><?php echo $d['penjualan_id']; ?></td>
                <td><?php echo $d['barang_id']; ?></td>
                <td><?php echo $d['jumlah_transaksi']; ?></td>
                <td><?php echo $d['member_id']; ?></td>
                <td><?php echo $d['total']; ?></td>
                <?php if ($edit_hapus_visible): ?>
                    <td>
                        <?php if ($level == 1 || $level == 4): ?>
                            <a href="edit_transaksi.php?id=<?php echo $d['id_transaksi']; ?>">Edit</a>
                            <a href="hapus_transaksi.php?id=<?php echo $d['id_transaksi']; ?>">Hapus</a>
                        <?php elseif ($level == 3): ?>
                            <a href="edit_transaksi.php?id=<?php echo $d['id_transaksi']; ?>">Edit</a>
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
