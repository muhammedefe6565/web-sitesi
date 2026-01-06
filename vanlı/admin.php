<?php 
include 'baglanti.php';
include 'header.php'; 

// Güvenlik: Admin değilse ana sayfaya şutla
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'bayi') {
    header("Location: index.php");
    exit();
}

// Ürün Ekleme İşlemi
if (isset($_POST['urun_ekle'])) {
    $ad = $_POST['ad'];
    $tur = $_POST['tur'];
    $fiyat = $_POST['fiyat'];
    $stok = $_POST['stok'];
    
    $conn->query("INSERT INTO enstrumanlar (ad, tur, fiyat, stok) VALUES ('$ad', '$tur', '$fiyat', '$stok')");
    echo "<div class='alert'>✅ Mal rafa kondu patron.</div>";
}
?>

<h2 style="color:#ff5252;">🔥 Admin Paneli</h2>

<div style="display:grid; grid-template-columns: 1fr 1fr; gap: 20px;">
    
    <div>
        <h3>Yeni Enstrüman Ekle</h3>
        <form method="post">
            <input type="text" name="ad" placeholder="Ürün Adı" required>
            <select name="tur">
                <option value="Gitar">Gitar</option>
                <option value="Piyano">Piyano</option>
                <option value="Bateri">Bateri</option>
            </select>
            <input type="number" step="0.01" name="fiyat" placeholder="Fiyat" required>
            <input type="number" name="stok" placeholder="Stok" required>
            <button type="submit" name="urun_ekle">Ekle</button>
        </form>
    </div>

    <div>
        <h3>📦 Son Siparişler</h3>
        <table>
            <tr>
                <th>Kim Aldı?</th>
                <th>Ürün</th>
                <th>Fiyat</th>
            </tr>
            <?php
            // Join ile kullanıcı mailini de çekiyoruz
            $sql = "SELECT s.*, k.email FROM siparisler s JOIN kullanicilar k ON s.kullanici_id = k.id ORDER BY s.id DESC LIMIT 10";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td><small>{$row['email']}</small></td>
                    <td>{$row['urun_ad']}</td>
                    <td>{$row['fiyat']} ₺</td>
                </tr>";
            }
            ?>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>