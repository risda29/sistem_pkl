<?php echo view('template/header'); ?>
<?php echo view('template/sidebar'); ?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Detail Pengguna</h4>
                        </div>
                        <div class="card-body">
                            <!-- Detail Pengguna -->
                            <div class="user-details">
                                <h5>Username: <?= esc($user['username']); ?></h5>
                                <p>Email: <?= esc($user['email']); ?></p>
                                <p>Level User: <?= esc($user['leveluser']); ?></p>
                            </div>

                            <!-- Aktivitas Pengguna -->
                            <div class="user-aktivitas mt-4">
                                <h5>Aktivitas Pengguna:</h5>
                                <?php if (!empty($aktifitas)): ?>
                                    <ul>
                                        <?php foreach ($aktifitas as $item): ?>
                                            <li>
                                                <strong><?= esc($item['tipe_aktifitas']); ?></strong>: <?= esc($item['detail_aktifitas']); ?>
                                                <br><small>Waktu: <?= esc($item['created_at']); ?></small>
                                                
                                                <!-- Jika aktivitas terkait dengan kelas -->
                                                <?php if (!empty($item['kelas_judul'])): ?>
                                                    <br><strong>Kelas: </strong><?= esc($item['kelas_judul']); ?>
                                                <?php endif; ?>
                                                
                                                <!-- Jika aktivitas terkait dengan story -->
                                                <?php if (!empty($item['story_judul'])): ?>
                                                    <br><strong>Story: </strong><?= esc($item['story_judul']); ?>
                                                <?php endif; ?>
                                                
                                                <!-- Jika aktivitas terkait dengan user -->
                                                <?php if (!empty($item['user_username'])): ?>
                                                    <br><strong>User: </strong><?= esc($item['user_username']); ?>
                                                <?php endif; ?>
                                                
                                                <!-- Jika aktivitas terkait dengan link PDF -->
                                                <?php if (strpos($item['detail_aktifitas'], 'pdf') !== false): ?>
                                                    <br><strong>PDF Link Diklik</strong>
                                                <?php endif; ?>

                                                <!-- Jika aktivitas terkait dengan link YouTube -->
                                                <?php if (strpos($item['detail_aktifitas'], 'youtube') !== false): ?>
                                                    <br><strong>YouTube Link Diklik</strong>
                                                <?php endif; ?>

                                                <!-- Jika aktivitas terkait dengan gambar -->
                                                <?php if (strpos($item['detail_aktifitas'], 'gambar') !== false): ?>
                                                    <br><strong>Gambar Diklik</strong>
                                                <?php endif; ?>

                                                <!-- Jika aktivitas terkait dengan Google Meet -->
                                                <?php if (strpos($item['detail_aktifitas'], 'google meet') !== false): ?>
                                                    <br><strong>Google Meet Link Diklik</strong>
                                                <?php endif; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else: ?>
                                    <p>Tidak ada aktivitas yang tercatat.</p>
                                <?php endif; ?>
                            </div>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- /.col-md-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.page-inner -->
    </div> <!-- /.content -->
</div> <!-- /.main-panel -->

<?php echo view('template/footer'); ?>
