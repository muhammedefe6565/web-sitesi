<?php
// Yo, burası bağlantı ayarları.
// XAMPP default şifresi genellikle boştur.
$servername = "localhost";
$username = "root";
$password = ""; // Şifren varsa buraya yaz kral
$dbname = "muzik_dukkani"; // Az önce kurduğumuz mekanın adı

// Bağlantıyı kuruyoruz (Connection check)
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantı koptuysa hata verip beat'i durduruyoruz
if ($conn->connect_error) {
    die("Bağlantı Hatası (Connection Failed): " . $conn->connect_error);
}

// Türkçe karakter sorunu olmasın diye ayar çekiyoruz (UTF-8 Flow)
$conn->set_charset("utf8");
?>