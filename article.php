<?php
include 'db.php';
session_start();
if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit(); }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $uid = $_SESSION['user_id'];
    
    $sql = "INSERT INTO articles (title, content, author_id) VALUES ('$title', '$content', '$uid')";
    mysqli_query($conn, $sql);
    header("Location: index.php");
}
?>
<form method="POST">
    <input type="text" name="title" placeholder="Judul Artikel" required><br>
    <textarea name="content" placeholder="Isi artikel..." rows="10" cols="30" required></textarea><br>
    <button type="submit">Terbitkan</button>
</form>