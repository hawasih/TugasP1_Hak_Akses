<?php
    include "header.php";
    if($_GET['page'] == 'home') {
        include "../form/home.php";
    } elseif($_GET['page'] == 'barang') {
        include "../form/tampilan_barang.php";
    } elseif($_GET['page'] == 'kategori') {
        include "../form/tampilan_kategori.php";
    } elseif($_GET['page'] == 'member') {
        include "../form/tampilan_member.php";
    } elseif($_GET['page'] == 'penjualan') {
        include "../form/tampilan_penjualan.php";
    } elseif($_GET['page'] == 'transaksi') {
        include "../form/tampilan_transaksi.php";
    } elseif($_GET['page'] == 'user') {
        include "../form/tampilan_user.php";
    } elseif($_GET['page'] == 'report') {
        include "../form/view_report.php";
    } elseif($_GET['page'] == 'lbarang') {
        include "../form/tambah_barang.php";
    } elseif($_GET['page'] == 'lkategori') {
        include "../form/tambah_kategori.php";
    } elseif($_GET['page'] == 'lmember') {
        include "../form/tambah_member.php";
    } elseif($_GET['page'] == 'lpenjualan') {
        include "../form/tambah_penjualan.php";
    } elseif($_GET['page'] == 'ltransaksi') {
        include "../form/tambah_transaksi.php";
    } elseif($_GET['page'] == 'luser') {
        include "../form/tambah_user.php";
    } else {
        echo "page tidak ditemukan";
    }
?>