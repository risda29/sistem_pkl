<?php echo view('template/header'); ?>

<body>
    <?php echo view('template/sidebar_pengguna'); ?>

    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="row">
                    <div class="col-12">
                        <?php if (session()->has('message')): ?>
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <?= session('message') ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title mb-0">Modul Storyteller</h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <div id="accordion">
                                <?php if (!empty($story)): ?>
                                    <?php foreach ($story as $key => $item): ?>
                                        <div class="card mb-3">
                                            <div class="card-header" id="heading<?= $key ?>">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?= $key ?>" aria-expanded="true" aria-controls="collapse<?= $key ?>">
                                                        <?= $item['judul'] ?>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapse<?= $key ?>" class="collapse" aria-labelledby="heading<?= $key ?>" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <p><strong>Artikel:</strong></p>
                                                            <p><?= $item['artikel']; ?></p>
                                                            <p><strong>Link Materi:</strong> 
                                                                <?php if (!empty($item['link_tree'])): ?>
                                                                    <a href="<?= htmlspecialchars($item['link_tree']); ?>" target="_blank">
                                                                        <br>Klik untuk buka Link Materi</a>
                                                                <?php else: ?>
                                                                    <span>Tidak ada Link Tree</span>
                                                                <?php endif; ?>
                                                            </p>
                                                            <p><strong>Link Tugas:</strong> 
                                                            <?php if (!empty($item['tugas_link'])): ?>
                                                                <a href="<?= htmlspecialchars($item['tugas_link']); ?>" target="_blank">
                                                                    <br>Klik untuk buka Google Form</a>
                                                            <?php else: ?>
                                                                <span>Tidak ada tugas</span>
                                                            <?php endif; ?>
                                                        </p>
                                                        </div>
                                                        <div class="col-md-4">
                                                        <strong>Gambar:</strong><br>
                                                        <?php if (!empty($item['gambar'])): ?>
                                                            <a href="<?= base_url("foto/" . $item['gambar']) ?>" class="mfp-iframe" title="Zoom">
                                                                <img src="<?= base_url("foto/" . $item['gambar']) ?>" class="img-fluid" alt="gambar"
                                                                    style="max-height: 150px; width: 100%; object-fit: cover; margin-top: 5px;"> <br>
                                                            </a>
                                                        <?php else: ?>
                                                            <p>Tidak ada gambar</p>
                                                        <?php endif; ?>
                                                                

                                                            <strong>Video:</strong><br>
                                                            <?php if (!empty($item['youtube_link'])): 
                                                                // Ambil ID video dari link YouTube
                                                                preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/|youtube\.com\/shorts\/)([\w-]+)/', $item['youtube_link'], $matches);
                                                                $video_id = $matches[1] ?? '';

                                                                // Cek jika ID video valid
                                                                if (!empty($video_id)): ?>
                                                                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/<?= htmlspecialchars($video_id, ENT_QUOTES, 'UTF-8') ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                                    <p><a href="https://www.youtube.com/watch?v=<?= htmlspecialchars($video_id, ENT_QUOTES, 'UTF-8') ?>" target="_blank">Lihat di YouTube</a></p>
                                                                <?php else: ?>
                                                                    <p>Video tidak dapat diputar.</p>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="text-left mt-3">
                                                        <!-- Tombol "Selesai Baca" -->
                                                        <form action="<?= base_url('story/selesai_baca/' . $item['id_story']) ?>" method="post">
                                                            <button type="submit" class="btn btn-success">Selesai Baca</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="alert alert-warning">
                                        Tidak ada story yang tersedia.
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo view('template/footer'); ?>
</body>
