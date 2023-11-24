<?php
session_start();
if (isset($_SESSION['error_message'])) {
    // Handle the error message as needed
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Quicksand', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #2c3e50; /* Warna latar belakang */
            margin: 0;
            animation: animateBackground 10s linear infinite alternate;
        }

        @keyframes animateBackground {
            0% {
                background-position: 0% 0%;
            }
            100% {
                background-position: 100% 100%;
            }
        }

        .signin {
            background: rgba(255, 255, 255, 0.95); /* Latar belakang semi-transparan untuk konten */
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 300px;
            max-width: 100%;
            padding: 20px;
            text-align: center;
        }

        .header {
            background: #3498db; /* Warna latar belakang header */
            padding: 10px;
            border-radius: 4px 4px 0 0;
            color: #fff;
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #2c3e50; /* Warna teks */
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #dddfe2;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background: #3498db; /* Warna latar belakang tombol */
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background: #2980b9; /* Warna latar belakang tombol saat hover */
        }

        #notif {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }

        .links {
            margin-top: 15px;
        }

        .links a {
            color: #3498db; /* Warna teks link */
            text-decoration: none;
            margin-right: 10px;
        }
    </style>
    <title>Login Page</title>
</head>
<body>

    <div class="signin">
        <div class="header">Keuangan</div>
        <form action="config/login.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
            <div id="notif">
                <?php
                if (isset($_SESSION['error_message'])) {
                    echo $_SESSION['error_message'];
                    unset($_SESSION['error_message']);
                }
                ?>
            </div>
        </form>
        <div class="links">
            <a href="#">Forgot Password</a>
            <a href="form/signup.php">Sign Up</a>
        </div>
    </div>

</body>
</html>
