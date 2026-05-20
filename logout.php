<?php
// 1. Mulai sesi agar PHP tahu sesi mana yang akan dihapus
session_start();

// 2. Kosongkan semua variabel sesi
$_SESSION = array();

// 3. Hapus session cookie jika ada (opsional tapi disarankan untuk keamanan)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 4. Hancurkan sesi secara total
session_destroy();

// 5. Alihkan pengguna kembali ke halaman utama (index.php)
header("Location: index.php");
exit();
?>