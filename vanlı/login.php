<?php 
include 'baglanti.php';
include 'header.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $sifre = $_POST['sifre'];

    // Mail ve Şifre kontrolü
    $sql = "SELECT * FROM kullanicilar WHERE email='$email' AND sifre='$sifre'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['rol'] = $row['rol']; // 'bayi' veya 'musteri'
        
        // Rota oluşturma (Routing)
        if($row['rol'] == 'bayi'){
            header("Location: admin.php"); // Patronsa ofise
        } else {
            header("Location: index.php"); // Müşteriyse markete
        }
        exit();
    } else {
        echo "<div class='alert alert-error'>❌ Hatalı mail veya şifre kral.</div>";
    }
}
?>

<h2>🔐 Giriş Yap</h2>
<form method="post">
    <label>Email:</label>
    <input type="email" name="email" required placeholder="admin@dukkan.com">
    
    <label>Şifre:</label>
    <input type="password" name="sifre" required>
    
    <button type="submit">Giriş Yap</button>
</form>

<?php include 'footer.php'; ?>