<?php 
include 'baglanti.php';
include 'header.php'; 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
?>

<h2>👤 Profilim: <?php echo $_SESSION['email']; ?></h2>

<h3>🛍️ Geçmiş Siparişlerin</h3>
<table>
    <tr>
        <th>Sipariş No</th>
        <th>Ürün</th>
        <th>Fiyat</th>
        <th>Tarih</th>
    </tr>
    <?php
    $sql = "SELECT * FROM siparisler WHERE kullanici_id = '$user_id' ORDER BY id DESC";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>#{$row['id']}</td>
                <td>{$row['urun_ad']}</td>
                <td>{$row['fiyat']} ₺</td>
                <td>{$row['tarih']}</td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Henüz siftah yapmadın kral.</td></tr>";
    }
    ?>
</table>

<?php include 'footer.php'; ?>