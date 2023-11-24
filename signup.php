<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
</head>
<?php
    // Koneksi database
    include '../config/koneksi.php';
    
    // Menangkap data yang dikirim dari form
    if (!empty($_POST['save'])) {
        $Nama = $_POST['Nama'];
        $Password = md5($_POST['Password']); // Hash password dengan MD5
        $Level = $_POST['Level'];
        $Status = $_POST['Status'];
        
        // Menginput data ke database
        $a = mysqli_query($koneksi,"INSERT INTO user VALUES('', '$Nama', '$Password', '$Level', '$Status')");
        
        if ($a) {
            // Mengalihkan halaman kembali
            header("location:../index.php");
        } else {
            echo mysqli_error();
        }
    }
?>

<body>
    <br>
    <a href="../index.php"><button>Kembali</button></a>
    <br><br>
    <h3>SIGN UP</h3>
    <form method="POST">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="Nama"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="Password"></td>
            </tr>
            <tr>
                <td>Level</td>
                <td>
                    <select name="Level" id="">
                        <option value="">-----Pilih</option>
                        <option value="1">Admin</option>
                        <option value="2">Staff</option>
                        <option value="3">Supervisor</option>
                        <option value="4">Manager</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="Status" id="">
                        <option value="">-----Pilih</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="save"></td>
            </tr>
        </table>
    </form>
</body>
</html>
