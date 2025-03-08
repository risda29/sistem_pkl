<?php echo view('template/header'); ?>

<body>
    <?php echo view('template/sidebar'); ?>

    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <!-- Welcome Section -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading">Selamat datang, 
                                <a href="<?= base_url('Profil'); ?>">
                                   
                                </a>
                            </h4>
                            <p>Ini adalah dashboard Anda. Di sini Anda bisa melihat informasi dan pengaturan terkait akun Anda.</p>
                        </div>
                    </div>
                </div>

                <!-- Stats Section (User and Admin) -->
                <div class="row">
                    <!-- Total Pengguna -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Total Pengguna</h5>
                                <h3 class="text-danger"><?= $jumlah_pengguna; ?></h3>
                                <a href="<?= base_url('KelolaUser') ?>">
                                    Total Pengguna </a>
                            </div>
                        </div>
                    </div>

                    <!-- Total Kelas -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Total Kelas</h5>
                                <h3 class="text-danger"><?= $jumlah_kelas; ?></h3>
                                <a href="<?= base_url('Kelas') ?>">
                                Total Kelas </a>
                            </div>
                        </div>
                    </div>

                    <!-- Total Cerita -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Total Storyteller</h5>
                                <h3 class="text-danger"><?= $jumlah_story; ?></h3>
                                <a href="<?= base_url('Story') ?>">
                                Total Storyteller </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Stats Section (for all users) -->
                <div class="row">
                    <!-- Kelas Anda -->
                   

            </div>
        </div>
    </div>
</div>

<?php echo view('template/footer'); ?>
