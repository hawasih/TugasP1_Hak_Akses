<!DOCTYPE html>
<html lang="en">

<head>
    <title>Keuangan</title>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #111;
        }

        .active {
            background-color: #04AA6D;
        }

        .kembali {
            display: flex;
            justify-content: right;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['nama'])) {
        echo "Selamat datang, " . $_SESSION['nama'] . "!";
    } else {
        header('location: ../index.php');
    }
    ?>
    <a href="logout.php" class="kembali">Logout</a>

    <ul>
        <li><a class="active" href="?page=home">Home</a></li>

        <?php
        $level = $_SESSION['level'];

        // Halaman yang bisa diakses oleh level admin, manager, dan supervisor
        $allowedPages = ['user', 'barang', 'transaksi', 'kategori', 'member', 'penjualan', 'report'];

        // Halaman yang hanya bisa diakses oleh level staff
        $staffOnlyPage = ['transaksi'];

        foreach ($allowedPages as $page) {
            // Jika pengguna adalah admin, manager, atau supervisor, tampilkan semua halaman
            if ($level == 1 || $level == 3 || $level == 4) {
                echo '<li><a href="?page=' . $page . '">' . ucfirst($page) . '</a></li>';
            }
            // Jika pengguna adalah staff, tampilkan hanya halaman transaksi
            elseif ($level == 2 && in_array($page, $staffOnlyPage)) {
                echo '<li><a href="?page=' . $page . '">' . ucfirst($page) . '</a></li>';
            }
        }
        ?>
    </ul>
</body>

</html>
