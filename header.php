<?php session_start(); 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WikiLite - Ensiklopedia Bebas</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f6f6f6; font-family: 'serif'; }
        .sidebar { background: #fff; border-right: 1px solid #a7d7f9; min-height: 100vh; }
        .main-content { background: #fff; border: 1px solid #a7d7f9; border-right: none; border-top: none; padding: 20px 40px; }
        .wiki-header { border-bottom: 1px solid #a2a9b1; margin-bottom: 20px; padding-bottom: 10px; }
        .navbar-brand img { width: 120px; }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-2 d-none d-md-block sidebar p-3">
            <div class="text-center mb-4">
                <h4 class="text-primary">Wiki<span class="text-dark">Lite</span></h4>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link text-dark" href="index.php">Halaman Utama</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="#">Tentang Wiki</a></li>
                <hr>
                <?php if(isset($_SESSION['username'])): ?>
                    <li class="nav-item"><a class="nav-link text-success" href="add_article.php">+ Buat Artikel</a></li>
                    <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Keluar (<?php echo $_SESSION['username']; ?>)</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link text-primary" href="login.php">Log masuk</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary" href="register.php">Daftar</a></li>
                <?php endif; ?>
            </ul>
        </nav>