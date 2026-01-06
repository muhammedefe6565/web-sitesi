<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Müzik Dükkanı V2</title>
    <style>
        /* RAPPER STYLE DARK THEME */
        body { margin: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #121212; color: #e0e0e0; }
        
        /* Navbar */
        nav { background-color: #1f1f1f; padding: 15px; border-bottom: 2px solid #bb86fc; display: flex; justify-content: space-between; align-items: center; }
        nav .brand { font-size: 24px; font-weight: bold; color: #bb86fc; text-decoration: none; }
        nav ul { list-style: none; margin: 0; padding: 0; display: flex; }
        nav ul li { margin-left: 20px; }
        nav ul li a { color: #fff; text-decoration: none; font-size: 16px; transition: 0.3s; }
        nav ul li a:hover { color: #bb86fc; }

        /* Container */
        .container { max-width: 1000px; margin: 30px auto; padding: 20px; background: #1e1e1e; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.5); }
        
        /* Formlar & Tablolar */
        input, select, button { width: 100%; padding: 12px; margin: 8px 0; border-radius: 5px; border: 1px solid #333; background: #2c2c2c; color: white; box-sizing: border-box; }
        button { background-color: #bb86fc; color: #000; font-weight: bold; cursor: pointer; border: none; transition: 0.3s; }
        button:hover { background-color: #9955e8; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 20px; color: #ccc; }
        th, td { padding: 12px; border-bottom: 1px solid #333; text-align: left; }
        th { color: #bb86fc; }
        
        .alert { padding: 10px; background: #2e7d32; color: white; border-radius: 5px; margin-bottom: 15px; text-align: center; }
        .alert-error { background: #c62828; }
    </style>
</head>
<body>

<nav>
    <a href="index.php" class="brand">🎧 BeatStore</a>
    <ul>
        <?php if(isset($_SESSION['user_id'])): ?>
            <li><a href="index.php">Ana Sahne</a></li>
            
            <?php if($_SESSION['rol'] == 'bayi'): ?>
                <li><a href="admin.php" style="color:#ff5252;">Admin Paneli</a></li>
            <?php else: ?>
                <li><a href="profil.php">Profilim</a></li>
            <?php endif; ?>
            
            <li><a href="cikis.php">Çıkış (Out)</a></li>
        <?php else: ?>
            <li><a href="login.php">Giriş</a></li>
            <li><a href="kayit.php">Kayıt Ol</a></li>
        <?php endif; ?>
    </ul>
</nav>

<div class="container">