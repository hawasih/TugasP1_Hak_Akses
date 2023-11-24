<?php
    if (!isset($_SESSION['nama'])) {
        header('location: ../index.php'); // Redirect to the login page if not logged in
        exit(); }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori</title>
</head>
<?php
    //Koneksi ke database
    include '../config/koneksi.php';
    //Menangkap data yang dikirim dari form
    if(!empty($_POST['save'])){
        $Nama = $_POST['nama_kategori'];
        $Diskon = $_POST['diskon'];
        //menginput data ke database
        $a = mysqli_query($koneksi,"insert into kategori values('','$Nama', $Diskon)");
        if($a){
            //mengalihkan ke halaman kembali
            header("location:?page=kategori");
        }else{
            echo mysqli_error();
        }
    }
?>
<body>
    <h2>Pemograman 1 2023</h2>
    <br>
    <a href="?page=kategori">Kembali</a>
    <br>
    <h3>TAMBAH DATA KATEGORI</h3>
    <form method="POST">
        <table>
            <tr>
                <td>Nama Kategori</td>
                <td><input type="text" name="nama_kategori"></td>
            </tr>
            <tr>
                <td>Diskon</td>
                <td><input type="number" name="diskon"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="save"></td>
            </tr>
        </table>
    </form>
</body>
</html>