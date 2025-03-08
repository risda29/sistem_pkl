<?php echo view('template/header'); ?>

<body>

    <?php echo view('template/sidebar_pengguna'); ?>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="row">
                    <div class="col-12">
                        <!-- Alert message -->
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
                                <h4 class="card-title mb-0">Modul Kelas Data</h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <div id="accordion">
                                <?php if (!empty($kelas)): ?>
                                    <?php foreach ($kelas as $key => $item): ?>
                                        <div class="card mb-3">
                                            <div class="card-header" id="heading<?= $key ?>">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-toggle="collapse"
                                                        data-target="#collapse<?= $key ?>" aria-expanded="true"
                                                        aria-controls="collapse<?= $key ?>">
                                                        <?= $item['judul'] ?>
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="collapse<?= $key ?>" class="collapse" aria-labelledby="heading<?= $key ?>"
                                                data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <p><strong>Artikel:</strong></p>
                                                            <p><?= $item['artikel']; ?></p>
                                                            <p><strong>Link Materi:</strong> 
                                                                <?php if (!empty($item['link_tree'])): ?>
                                                                    <a href="<?= htmlspecialchars($item['link_tree']); ?>" target="_blank">
                                                                        <br>Klik untuk buka Materi</a>
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
                                                        <?php if (!empty($item['youtube_link'])): ?>
                                                            <iframe width="100%" height="200"
                                                                src="https://www.youtube.com/embed/<?= parse_url($item['youtube_link'], PHP_URL_PATH); ?>"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                                allowfullscreen style="margin-top: 5px;"></iframe>
                                                        <?php else: ?>
                                                            <p>Tidak ada video</p>
                                                        <?php endif; ?>
                                                            <!-- Button to Download PDF -->
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="text-leftt mt-3">
                                                        <!-- Tombol "Selesai Baca" -->
                                                        <form
                                                            action="<?= base_url('kelas/selesai_baca/' . $item['id_kelas']) ?>"
                                                            method="post">
                                                            <button type="submit" class="btn btn-success">Selesai Baca</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="alert alert-warning">
                                        Tidak ada kelas yang tersedia.
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- JS Script for Collapse -->
    <script>
        $(document).ready(function () {
            $('#accordion .collapse').collapse({
                toggle: false
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <?php echo view('template/footer'); ?>
</body>