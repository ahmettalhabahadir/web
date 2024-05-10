<?php
// Login formundan gelen kullanıcı adı ve şifre
$kullaniciAdi = $_POST['kullaniciAdi'];
$sifre = $_POST['sifre'];

// Örnek kullanıcı adı ve şifre
$ornekSifre = substr($kullaniciAdi, 0, strpos($kullaniciAdi, '@')); // Kullanıcı adından @ işaretinden önceki kısmı alıyoruz

// Kullanıcı adı ve şifre kontrolü
if ($sifre == $ornekSifre) {
    // Hoşgeldiniz mesajını ekrana yazdır
    echo "<div style='text-align: center;'><h2>Hoşgeldiniz $ornekSifre</h2>";

    ?>
    <!-- Butonu ekrana yazdır -->
    <form action="proje.html" style="text-align: center;">
        <button type="submit" style="background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;">Geri Dön</button>
    </form></div>
    <?php
} else {
    // Başarısız giriş durumunda kullanıcıyı login sayfasına geri yönlendir
    header("Location: girisyap.html");
    exit;
}
?>
