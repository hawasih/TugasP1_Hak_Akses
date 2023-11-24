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
        
        $Tanggal = $_POST['tgl_transaksi'];
        $No = $_POST['no_transaksi'];
        $Jenis = $_POST['jenis_transaksi'];
        $Penjualan = $_POST['penjualan_id'];
        $Barang = $_POST['barang_id'];
        $Jumlah = $_POST['jumlah_transaksi'];
        $Member = $_POST['member_id'];
        $Total = $_POST['total'];
        //menginput data ke database
        $a = mysqli_query($koneksi,"insert into transaksi values('','$Tanggal','$No','$Jenis','$Penjualan','$Barang','$Jumlah','$Member','$Total')");
        if($a){
            //mengalihkan ke halaman kembali
            header("location:?page=transaksi");
        }else{
            echo mysqli_error();
        }
    }
?>
<body>
    <h2>Pemograman 1 2023</h2>
    <br>
    <a href="?page=transaksi">Kembali</a>
    <br>
    <h3>TAMBAH DATA TRANSAKSI</h3>
    <form method="POST">
        <table>
            <tr>
                <td>Tanggal Transaksi</td>
                <td><input type="date" name="tgl_transaksi"></td>
            </tr>
            <tr>
                <td>Nomor Transaksi</td>
                <td><input type="number" name="no_transaksi"></td>
            </tr>
            <tr>
                <td>Jenis Transaksi</td>
                <td><input type="text" name="jenis_transaksi"></td>
            </tr>
            <tr>
                <td>Id Penjualan</td>
                <td><input type="number" name="penjualan_id"></td>
            </tr>
            <tr>
                <td>Id Barang</td>
                <td><input type="number" name="barang_id"></td>
            </tr>
            <tr>
                <td>Jumlah Transaksi</td>
                <td><input type="number" name="jumlah_transaksi"></td>
            </tr>
            <tr>
                <td>Id Member</td>
                <td><input type="number" name="member_id"></td>
            </tr>
            <tr>
                <td>Total</td>
                <td><input type="number" name="total"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="save"></td>
            </tr>
        </table>
    </form>
</body>
</html>