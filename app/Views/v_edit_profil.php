<?php echo view('template/header'); ?>

<body>

    <?php echo view('template/sidebar'); ?>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <!-- Tambahkan bagian ini untuk menampilkan pesan alert -->
                <?php if (session()->getFlashdata('alerts')): ?>
                    <div class="alert alert-info" role="alert">
                        <ul>
                            <?php foreach (session()->getFlashdata('alerts') as $alert): ?>
                                <li>
                                    <?= esc($alert) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <!-- Akhir bagian pesan alert -->

                <div class="row">
                    <div class="col-md-6">
                        <!-- Form Edit -->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Profil</h4>
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url('Profil/edit_profil'); ?>" method="POST">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            placeholder="Masukkan Username baru">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Masukkan Email baru">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Masukkan Password baru">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                        <!-- End Form Edit -->
                    </div>
                </div>
                <?php echo view('template/footer'); ?>
            </div>
        </div>
    </div>

</body>

</html>