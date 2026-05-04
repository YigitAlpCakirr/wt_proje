<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $sifre = isset($_POST['sifre']) ? trim($_POST['sifre']) : '';

    if (empty($email) || empty($sifre)) {
        header("Location: login.html?error=empty");
        exit();
    }

    // Email'in sakarya.edu.tr ile bitip bitmediğini ve öğrenci numarasını çıkartmayı deneyelim
    if (preg_match('/^([a-zA-Z0-9]+)@sakarya\.edu\.tr$/', $email, $matches)) {
        $ogrenciNo = $matches[1];

        // Şifre tam olarak öğrenci numarasına eşit mi kontrolü
        if ($sifre === $ogrenciNo) {
            // Başarılı giriş - Session'a kaydet
            $_SESSION['user'] = $ogrenciNo;
            
            ?>
            <!DOCTYPE html>
            <html lang="tr">
            <head>
                <meta charset="UTF-8">
                <title>Giriş Başarılı</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
                <link rel="stylesheet" href="still.css">
                <style>
                    body {
                        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
                        height: 100vh;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }
                    .success-card {
                        background: white;
                        border-radius: 20px;
                        padding: 40px;
                        text-align: center;
                        box-shadow: 0 15px 30px rgba(0,0,0,0.2);
                        max-width: 500px;
                        width: 100%;
                    }
                    .success-icon {
                        font-size: 80px;
                        color: #28a745;
                        margin-bottom: 20px;
                    }
                </style>
            </head>
            <body>
                <div class="success-card">
                    <i class="fa-solid fa-circle-check success-icon"></i>
                    <h1 class="mb-4">Başarılı Giriş!</h1>
                    <div class="alert alert-success fs-4 fw-bold">
                        Hoşgeldiniz <?php echo htmlspecialchars($ogrenciNo); ?>
                    </div>
                    <p class="text-muted mt-3">Sisteme başarıyla giriş yaptınız. Yönlendiriliyorsunuz...</p>
                    <a href="index.html" class="btn btn-outline-success mt-3 rounded-pill px-4">Anasayfaya Dön</a>
                </div>
            </body>
            </html>
            <?php
            // Başarılı olursa 3 saniye sonra anasayfaya yönlendirebiliriz
            header("refresh:4;url=index.html");
            exit();
        } else {
            // Şifre yanlış
            header("Location: login.html?error=wrong");
            exit();
        }
    } else {
        // Mail formatı sakarya.edu.tr değil
        header("Location: login.html?error=invalid_format");
        exit();
    }
} else {
    // POST dışında bir istekle gelinirse login'e at
    header("Location: login.html");
    exit();
}
?>
