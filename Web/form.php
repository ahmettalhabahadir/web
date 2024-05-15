<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form verilerini al
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];
    $mesaj = $_POST['mesaj'];
    $dogumTarihi = $_POST['dogumtarihi'];
    $cinsiyet = $_POST['cinsiyet'];
    $sehir = $_POST['sehir'];

    // Dosya yükleme işlemi
    if (isset($_FILES['dosya']) && $_FILES['dosya']['error'] == 0) {
        $upload_dir = 'uploads/';
        $upload_file = $upload_dir . basename($_FILES['dosya']['name']);
    } else {
        $dosyaHata = "Dosya yükleme hatası: " . $_FILES['dosya']['error'];
    }

}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alınan Veriler</title>
    <style>
     body {
            font-family: Arial, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 50%;
            margin: auto;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        p {
            text-align: center;
            margin-top: 20px;
        }
        h2 {
           text-align: center;
        }
    </style>
</head>
<body>
    <h2>Alınan Veriler</h2>
    <?php if (isset($dosyaHata)) { ?>
        <p><?php echo $dosyaHata; ?></p>
    <?php } else { ?>
        <table>
            <tr>
                <th>Alan</th>
                <th>Değer</th>
            </tr>
            <tr>
                <td>Ad</td>
                <td><?php echo htmlspecialchars($ad); ?></td>
            </tr>
            <tr>
                <td>Soyad</td>
                <td><?php echo htmlspecialchars($soyad); ?></td>
            </tr>
            <tr>
                <td>E-posta</td>
                <td><?php echo htmlspecialchars($email); ?></td>
            </tr>
            <tr>
                <td>Telefon</td>
                <td><?php echo htmlspecialchars($telefon); ?></td>
            </tr>
            <tr>
                <td>Mesaj</td>
                <td><?php echo nl2br(htmlspecialchars($mesaj)); ?></td>
            </tr>
            <tr>
                <td>Doğum Tarihi</td>
                <td><?php echo htmlspecialchars($dogumTarihi); ?></td>
            </tr>
            <tr>
                <td>Cinsiyet</td>
                <td><?php echo htmlspecialchars($cinsiyet); ?></td>
            </tr>
            <tr>
                <td>Şehir</td>
                <td><?php echo htmlspecialchars($sehir); ?></td>
            </tr>
        </table>
        <p>Yönlendiriliyorsunuz</p>
    <?php 
    header("Refresh: 10; url=iletisim.html");
    exit;}?>
</body>
</html>
