<?php include 'db.php'; include 'header.php'; 
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT a.*, u.username FROM articles a JOIN users u ON a.author_id = u.id WHERE a.id = $id");
$article = mysqli_fetch_assoc($result);
?>
<main class="col-md-10 main-content">
    <div class="wiki-header d-flex justify-content-between align-items-center">
        <h1 class="display-6"><?php echo $article['title']; ?></h1>
        <span class="badge bg-light text-dark border">Penulis: <?php echo $article['username']; ?></span>
    </div>
    
    <div class="article-body mt-4" style="line-height: 1.8; font-size: 1.1rem;">
        <?php echo nl2br(htmlspecialchars($article['content'])); ?>
    </div>
</main>