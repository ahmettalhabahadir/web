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

    header("Refresh: 2; url=hakkimda.html");
} else {
    // Başarısız giriş durumunda kullanıcıyı login sayfasına geri yönlendir
    header("Location: girisyap.html");
    exit;
}
?>
