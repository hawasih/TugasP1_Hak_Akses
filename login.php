<?php
session_start();
include('koneksi.php');

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = md5($password);

    $query = "SELECT * FROM user WHERE nama='$username' AND password='$hashed_password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['level'] = $row['level'];

        header('location: form.php?page=home'); // Redirect to the welcome page
    } else {
        $_SESSION['error_message'] = "*Gagal Login. Username atau Password salah.";
        header('location: ../index.php'); // Redirect back to the login page
    }
}

?>