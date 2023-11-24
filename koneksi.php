<?php
    $koneksi = mysqli_connect("localhost","root","","keuangan");//("iplocal","username","password","nama database");

    // Check Connection
    if (mysqli_connect_errno()){
        echo "Koneksi database gagal : " . mysqli_connect_error();
    }else {
        echo "Terkoneksi";
    }
    

?>