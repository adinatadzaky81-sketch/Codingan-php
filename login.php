<?php
// 1. WAJIB DI BARIS PALING ATAS (Tanpa spasi/enter sebelumnya)
ob_start(); 
session_start();

// 2. Import koneksi database
include 'db.php'; 

$pesan = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$user'");
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($pass, $row['password'])) {
        // 3. Set Session
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];

        // 4. Redirect - Pastikan tidak ada echo/HTML sebelum baris ini
        header("Location: index.php");
        exit(); 
    } else {
        $pesan = "<div class='alert alert-danger'>Username atau password salah!</div>";
    }
}

// 5. Baru masukkan Template UI setelah logika PHP selesai
include 'header.php'; 
?>

<!-- HTML / Form Login di bawah sini -->
<main class="col-md-10 d-flex justify-content-center align-items-center">
    <div class="card shadow-sm" style="width: 400px; margin-top: 50px;">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Log Masuk</h3>
            
            <?php echo $pesan; ?>

            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Masuk</button>
            </form>
        </div>
    </div>
</main>

<?php 
// Akhiri buffering
ob_end_flush(); 
?>