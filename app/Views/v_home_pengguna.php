<?php echo view('template/header'); ?>

<body>
    <!-- Pastikan variabel $showKelasInteraktif dikirim ke sidebar_pengguna -->
    <?php echo view('template/sidebar_pengguna', ['showKelasInteraktif' => $showKelasInteraktif]); ?>

    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <!-- Welcome Section -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading">Selamat datang, 
                                <a href="<?= base_url('Profil'); ?>">
                                    <!-- Nama user atau info lainnya bisa ditampilkan di sini -->
                                </a>
                            </h4>
                            <p>Ini adalah dashboard Anda. Di sini Anda bisa melihat informasi dan pengaturan terkait akun Anda.</p>
                        </div>
                    </div>
                </div>

                <!-- Stats Section (User and Admin) -->
                <div class="row">
                    <!-- Total Kelas -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Materi Kelas</h5>
                                <h3 class="text-danger"><?= $jumlah_kelas; ?></h3>
                                <a href="<?= base_url('Kelas_pengguna') ?>">Materi Kelas</a>
                            </div>
                        </div>
                    </div>

                    <!-- Total Storyteller -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Materi Storyteller</h5>
                                <h3 class="text-danger"><?= $jumlah_story; ?></h3>
                                <a href="<?= base_url('Story_pengguna') ?>">Materi Storyteller</a>
                            </div>
                        </div>
                    </div>

                    <!-- Total Kelas Interaktif -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title"> Kelas Interaktif</h5>
                                <h3 class="text-danger"><?= $jumlah_interaktif; ?></h3>
                                <a href="<?= base_url('Kelasinteraktif_pengguna') ?>"> Kelas Interaktif</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Stats Section (for all users) -->
                <div class="row">
                    <!-- Konten atau statistik tambahan bisa ditambahkan di sini -->
                </div>
            </div>
        </div>
    </div>

    <?php echo view('template/footer'); ?>
</body>
</html>