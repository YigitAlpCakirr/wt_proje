<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Gelen Mesaj</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Form Başarıyla Gönderildi</h3>
            </div>
            <div class="card-body">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $ad = htmlspecialchars($_POST['ad']);
                    $email = htmlspecialchars($_POST['email']);
                    $telefon = htmlspecialchars($_POST['telefon']);
                    $konu = htmlspecialchars($_POST['konu']);
                    $cinsiyet = htmlspecialchars($_POST['cinsiyet']);
                    $mesaj = htmlspecialchars($_POST['mesaj']);
                    
                    echo "<table class='table table-bordered'>";
                    echo "<tr><th>Ad Soyad</th><td>$ad</td></tr>";
                    echo "<tr><th>E-Posta</th><td>$email</td></tr>";
                    echo "<tr><th>Telefon</th><td>$telefon</td></tr>";
                    echo "<tr><th>Konu</th><td>$konu</td></tr>";
                    echo "<tr><th>Cinsiyet</th><td>$cinsiyet</td></tr>";
                    echo "<tr><th>Mesaj</th><td>$mesaj</td></tr>";
                    echo "</table>";
                } else {
                    echo "<div class='alert alert-danger'>Veriler doğrudan erişimle görüntülenemez. Lütfen formu kullanın.</div>";
                }
                ?>
                <a href="iletisim.html" class="btn btn-secondary mt-3">Geri Dön</a>
            </div>
        </div>
    </div>
</body>
</html>