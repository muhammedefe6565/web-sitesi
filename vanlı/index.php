<?php 
include 'baglanti.php';
include 'header.php'; 

// Satın Alma İşlemi
if (isset($_POST['satin_al']) && isset($_SESSION['user_id'])) {
    $urun_ad = $_POST['urun_ad'];
    $fiyat = $_POST['fiyat'];
    $user_id = $_SESSION['user_id'];
    
    $conn->query("INSERT INTO siparisler (kullanici_id, urun_ad, fiyat) VALUES ('$user_id', '$urun_ad', '$fiyat')");
    echo "<div class='alert'>✅ Hayırlı olsun, sipariş alındı!</div>";
}
?>

<h2>🛒 Mağaza Vitrini</h2>

<?php if(!isset($_SESSION['user_id'])): ?>
    <div class="alert alert-error">Alışveriş yapmak için giriş yapmalısın kral.</div>
<?php endif; ?>

<table>
    <thead>
        <tr>
            <th>Ürün Adı</th>
            <th>Tür</th>
            <th>Fiyat</th>
            <th>İşlem</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM enstrumanlar WHERE stok > 0";
        $result = $conn->query($sql);
        
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['ad']}</td>
                <td>{$row['tur']}</td>
                <td>{$row['fiyat']} ₺</td>
                <td>";
                
                if(isset($_SESSION['user_id'])) {
                    echo "<form method='post' style='margin:0;'>
                        <input type='hidden' name='urun_ad' value='{$row['ad']}'>
                        <input type='hidden' name='fiyat' value='{$row['fiyat']}'>
                        <button type='submit' name='satin_al'>Satın Al 💳</button>
                    </form>";
                } else {
                    echo "<small>Giriş Yapın</small>";
                }
                
            echo "</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php include 'footer.php'; ?>