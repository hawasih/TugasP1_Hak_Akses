<?php
    if (!isset($_SESSION['nama'])) {
        header('location: ../index.php'); // Redirect to the login page if not logged in
        exit(); }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profil Saya</title>
    <style>
        .mantap {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 90vh;
}

.profile-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    max-width: 400px;
    width: 100%;
}

.profile-container img {
    max-width: 100%;
    border-radius: 50%;
}

.profile-container h2 {
    margin-top: 0;
    color: #333;
}

.profile-container p {
    color: #777;
}

.social-links {
    margin-top: 20px;
}

.social-links a {
    display: inline-block;
    margin-right: 10px;
    text-decoration: none;
    color: #007BFF;
}

.social-links a:hover {
    color: #0056b3;
}
    </style>
</head>
<body>
    <div class="mantap">
    <div class="profile-container" >
        <img href="https://media-cldnry.s-nbcnews.com/image/upload/rockcms/2023-09/230913-kim-putin-mb-1001-ef7db6.jpg" alt="Foto Profil">
        <h2>siti hawasih</h2>
        <h3>220220018</h3>
        <p>Pemograman 1</p>
        <div class="social-links">
            <a href="https://www.instagram.com/hi.hawasih/">Instagram</a>
            <a href="https://www.youtube.com/channel/UCXVyO0kjSmkzz_nIF3s5YLQ">YouTube</a>
        </div>
    </div>
</div>
</body>
</html>