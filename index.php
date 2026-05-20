<?php include 'db.php'; include 'header.php'; ?>

        <!-- Konten Utama -->
        <main class="col-md-10 main-content">
            <div class="wiki-header">
                <h1 class="display-5">Selamat Datang di WikiLite</h1>
                <p class="text-muted">Ensiklopedia bebas yang bisa diperbaiki oleh siapa saja.</p>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h5>Daftar Artikel Terbaru:</h5>
                    <div class="list-group list-group-flush">
                        <?php
                        $res = mysqli_query($conn, "SELECT id, title FROM articles ORDER BY id DESC");
                        while($row = mysqli_fetch_assoc($res)) {
                            echo "<a href='view.php?id=".$row['id']."' class='list-group-item list-group-item-action text-primary'>".$row['title']."</a>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>