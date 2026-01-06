<?php 
include 'baglanti.php';
include 'header.php'; 

$mesaj = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $sifre = $_POST['sifre'];
    
    // Varsayılan olarak herkes 'musteri' doğar
    $sql = "INSERT INTO kullanicilar (email, sifre, rol) VALUES ('$email', '$sifre', 'musteri')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert'>✅ Kayıt tamam homie! Şimdi giriş yapabilirsin.</div>";
    } else {
        echo "<div class='alert alert-error'>❌ Hata: Bu mail zaten mekanda kayıtlı!</div>";
    }
}
?>

<h2>📝 Mahalleye Kayıt Ol</h2>
<form method="post">
    <label>Email Adresi:</label>
    <input type="email" name="email" required placeholder="ornek@mail.com">
    
    <label>Şifre:</label>
    <input type="password" name="sifre" required placeholder="Güçlü bir şifre seç">
    
    <button type="submit">Kayıt Ol</button>
</form>
<p style="text-align:center; margin-top:10px;">Zaten hesabın var mı? <a href="login.php" style="color:#bb86fc;">Giriş Yap</a></p>

<?php include 'footer.php'; ?>