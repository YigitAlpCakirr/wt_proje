<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$activePage = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <img class="img-fluid logo" src="Resimler/logo2.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                <li class="nav-item"><a class="nav-link <?php echo ($activePage == 'index.html' ? 'active' : ''); ?>" href="index.html"><i class="fa-solid fa-house me-1"></i> Anasayfa</a></li>
                <li class="nav-item"><span class="ayrac">|</span></li>
                <li class="nav-item"><a class="nav-link <?php echo ($activePage == 'hakkimda.html' ? 'active' : ''); ?>" href="hakkimda.html"><i class="fa-solid fa-circle-info me-1"></i> Özgeçmişim</a></li>
                <li class="nav-item"><span class="ayrac">|</span></li>
                <li class="nav-item"><a class="nav-link <?php echo ($activePage == 'sehrim.html' ? 'active' : ''); ?>" href="sehrim.html"><i class="fa-solid fa-location-dot me-1"></i> Şehrim</a></li>
                <li class="nav-item"><span class="ayrac">|</span></li>
                <li class="nav-item"><a class="nav-link <?php echo ($activePage == 'ilgialanlarim.html' ? 'active' : ''); ?>" href="ilgialanlarim.html"><i class="fa-solid fa-bookmark me-1"></i> İlgi Alanlarım</a></li>
                <li class="nav-item"><span class="ayrac">|</span></li>
                <li class="nav-item"><a class="nav-link <?php echo ($activePage == 'mirasimiz.html' ? 'active' : ''); ?>" href="mirasimiz.html"><i class="fa-solid fa-compass me-1"></i> Mirasımız</a></li>
                <li class="nav-item"><span class="ayrac">|</span></li>
                <li class="nav-item"><a class="nav-link <?php echo ($activePage == 'iletisim.html' ? 'active' : ''); ?>" href="iletisim.html"><i class="fa-solid fa-link me-1"></i> İletişim</a></li>
                
                <?php if(isset($_SESSION['user'])): ?>
                    <li class="nav-item ms-3">
                        <span class="nav-link fw-bold text-primary">
                            <i class="fa-solid fa-user me-1"></i> <?php echo htmlspecialchars($_SESSION['user']); ?>
                        </span>
                    </li>
                    <li class="nav-item"><a class="btn btn-outline-danger rounded-pill px-4 ms-2" href="logout.php">Çıkış Yap</a></li>
                <?php else: ?>
                    <li class="nav-item ms-3"><a class="btn btn-outline-primary rounded-pill px-4" href="login.html">Giriş</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
