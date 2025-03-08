<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.6;
            color: #333;
        }

        .section-content {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
            box-sizing: border-box;
        }

        .blog-entry {
            max-width: 800px;
            width: 100%;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .entry-header {
            margin-top: 100px;
        }

        .entry-title {
            font-size: 24px;
            font-weight: bold;
            color: #444;
            margin-bottom: 15px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        .entry-meta {
            font-size: 14px;
            color: #777;
            margin-bottom: 20px;
        }

        .list-article-thumb img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .text-left p {
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 10px;
        }

        .search-box {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        .search-box input[type="text"] {
            width: 60%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
            margin-right: 10px;
        }

        .search-box button {
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .search-box button:hover {
            background-color: #2980b9;
        }

        .learn-more-btn {
            display: inline-block;
            padding: 12px 20px;
            background-color: #3498db;
            color: white;
            text-align: center;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
            width: 100%;
        }

        .learn-more-btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <main id="main">
        <div class="section-content">
            <div class="blog-entry">
                <header class="entry-header">
                    <h3 class="entry-title">
                        <?php if ($kelas !== null): ?>
                            <?= $kelas->judul ?>
                        <?php else: ?>
                            Judul tidak tersedia
                        <?php endif; ?>
                    </h3>
                </header>
                <div class="entry-meta">
                    <span class="post-date">Diposting pada
                        <?php if ($kelas !== null): ?>
                            <?= date('j F, Y', strtotime($kelas->tanggal)) ?>
                        <?php else: ?>
                            Tanggal tidak tersedia
                        <?php endif; ?>
                    </span>
                </div>
                <div class="list-article-thumb">
                    <?php if ($kelas !== null && !empty($kelas->gambar)): ?>
                        <a href="<?= base_url('foto/' . $kelas->gambar) ?>" data-lightbox="image-1"
                            data-title="<?= $kelas->judul ?>">
                            <img src="<?= base_url('foto/' . $kelas->gambar) ?>" alt="<?= $kelas->judul ?>" decoding="async" />
                        </a>
                    <?php else: ?>
                        <p>Gambar tidak tersedia</p>
                    <?php endif; ?>
                </div>
                <div class="text-left">
                    <p>
                        <?php if ($kelas !== null): ?>
                            <?= $kelas->artikel ?>
                        <?php else: ?>
                            Artikel tidak tersedia
                        <?php endif; ?>
                    </p>
                </div>
                <!-- Tombol Pelajari Lebih Lanjut -->
                <a href="<?= base_url('/register') ?>" class="learn-more-btn">Ikuti Kelas</a>
            </div>
        </div>
    </main>
</body>

</html>
