<?php
    if (!isset($_SESSION['nama'])) {
        header('location: ../index.php'); // Redirect to the login page if not logged in
        exit(); }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Transaksi</title>
</head>
<?php
    //koneksi database
    include '../config/koneksi.php';
    //menangkap data yang dikirim dari form
    if(!empty($_POST['save'])){
        
        $Tanggal = $_POST['tanggal_penjualan'];
        $Nama = $_POST['nama_pelanggan'];
        $Total = $_POST['total_harga'];
        //menginput data ke database
        $a = mysqli_query($koneksi,"insert into penjualan values('','$Tanggal','$Nama','$Total')");
        if($a){
            //mengalihkan ke halaman kembali
            header("location:?page=penjualan");
        }else{
            echo mysqli_error();
        }
    }
?>
<body>
    <h2>Pemograman 1 2023</h2>
    <br>
    <a href="?page=penjualan">Kembali</a>
    <br>
    <h3>TAMBAH DATA PENJUALAN</h3>
    <form method="POST">
        <table>
            <tr>
                <td>Tanggal Penjualan</td>
                <td><input type="date" name="tanggal_penjualan"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama_pelanggan"></td>
            </tr>
            <tr>
                <td>Total Harga</td>
                <td><input type="number" name="total_harga"></td>
            </tr>
                <td></td>
                <td><input type="submit" name="save"></td>
            </tr>
        </table>
    </form>
</body>
</html>