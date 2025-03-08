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
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Kelas Interaktif</h4>
                        </div>
                        <div class="card-body">
                            <div id="accordion">
                                <?php if (!empty($interaktif)): ?>
                                    <?php foreach ($interaktif as $key => $item): ?>
                                        <div class="card mb-3">
                                            <div class="card-header" id="heading<?= $key ?>">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?= $key ?>" aria-expanded="true" aria-controls="collapse<?= $key ?>">
                                                        <?= $item['deskripsi'] ?>
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="collapse<?= $key ?>" class="collapse" aria-labelledby="heading<?= $key ?>" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <p><strong>Deskripsi:</strong></p>
                                                            <p><?= $item['deskripsi']; ?></p>
                                                            <p><strong>Link Zoom Kelas Interaktif:</strong>
                                                                <?php if (!empty($item['link_zoom'])): ?>
                                                                    <a href="<?= $item['link_zoom']; ?>" target="_blank">
                                                                        <br>Klik untuk Buka Link Zoom</a>
                                                                <?php else: ?>
                                                                    <span>Tidak ada link Zoom</span>
                                                                <?php endif; ?>
                                                            </p>
                                                            <p><strong>Link Tree (Materi,Presensi,Setifikat):</strong>
                                                                <?php if (!empty($item['link_tree'])): ?>
                                                                    <a href="<?= $item['link_tree']; ?>" target="_blank">
                                                                        <br>Klik untuk Buka Link Tree</a>
                                                                <?php else: ?>
                                                                    <span>Tidak ada link Tree</span>
                                                                <?php endif; ?>
                                                            </p>
                                                        </div>
                                                        <div class="col-md-4 d-flex align-items-center justify-content-center">
                                                        <div class="col-md-4">
                                                                <p><strong>Gambar:</strong></p>
                                                                <?php if (!empty($item['gambar'])): ?>
                                                                    <a href="<?= base_url("foto/" . $item['gambar']) ?>" class="mfp-iframe" title="Zoom">
                                                                        <img src="<?= base_url("foto/" . $item['gambar']) ?>" class="img-fluid" alt="gambar" style="max-width: 100%; height: auto; object-fit: contain;">
                                                                    </a>
                                                                <?php else: ?>
                                                                    <p>Tidak ada gambar</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="alert alert-warning">
                                        Tidak ada kelas interaktif yang tersedia.
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
        $(document).ready(function() {
            $('#accordion .collapse').collapse({ toggle: false });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <?php echo view('template/footer'); ?>
</body>
