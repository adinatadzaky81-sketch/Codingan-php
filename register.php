<?php 
include 'db.php'; 
include 'header.php'; 

$pesan = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = $_POST['password'];
    $confirm_pass = $_POST['confirm_password'];

    // Validasi sederhana
    if ($pass !== $confirm_pass) {
        $pesan = "<div class='alert alert-danger'>Konfirmasi password tidak cocok!</div>";
    } else {
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
        
        // Cek apakah username sudah ada
        $cek_user = mysqli_query($conn, "SELECT * FROM users WHERE username='$user'");
        if (mysqli_num_rows($cek_user) > 0) {
            $pesan = "<div class='alert alert-warning'>Username sudah digunakan, cari yang lain ya!</div>";
        } else {
            $sql = "INSERT INTO users (username, password) VALUES ('$user', '$hashed_pass')";
            if (mysqli_query($conn, $sql)) {
                $pesan = "<div class='alert alert-success'>Akun berhasil dibuat! Silakan <a href='login.php'>Login di sini</a></div>";
            } else {
                $pesan = "<div class='alert alert-danger'>Terjadi kesalahan saat mendaftar.</div>";
            }
        }
    }
}
?>

        <!-- Area Konten Utama -->
        <main class="col-md-10 d-flex justify-content-center align-items-center" style="min-height: 80vh;">
            <div class="card shadow-sm" style="width: 450px;">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold text-primary">Buat Akun Baru</h3>
                        <p class="text-muted small">Bergabunglah dengan komunitas WikiLite hari ini.</p>
                    </div>

                    <?php echo $pesan; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Pilih nama pengguna" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold">Konfirmasi Password</label>
                            <input type="password" name="confirm_password" class="form-control" placeholder="Ulangi password" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 shadow-sm">Daftar Sekarang</button>
                    </form>

                    <hr class="my-4">

                    <div class="text-center">
                        <p class="small mb-0">Sudah punya akun? <a href="login.php" class="text-decoration-none">Masuk ke sistem</a></p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>