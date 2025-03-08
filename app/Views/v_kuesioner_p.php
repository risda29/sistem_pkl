<?php echo view('template/header'); ?>
<body>
    <?php echo view('template/sidebar_pengguna'); ?>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="col-md-12">
                    <?php if (session()->has('message')) : ?>
                        <div class="alert alert-info"> <?= session('message') ?> </div>
                    <?php endif; ?>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Kuesioner</h4>
                        </div>
                        <div class="card-body">
                            <?php if (!$sudahMengisi) : ?>
                                <form method="POST" action="<?= base_url('Kuesioner_p/simpanJawaban') ?>">
                                    <?php foreach ($kuesioner as $index => $item) : ?>
                                        <div class="card mb-3 shadow-sm">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <?= esc($index + 1) . ". " . esc($item['pertanyaan']) ?>
                                                </h5>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" name="jawaban[<?= $item['id_kuesioner'] ?>]" value="1" required>
                                                        <label class="form-check-label"> 1</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" name="jawaban[<?= $item['id_kuesioner'] ?>]" value="2" required>
                                                        <label class="form-check-label"> 2</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" name="jawaban[<?= $item['id_kuesioner'] ?>]" value="3" required>
                                                        <label class="form-check-label"> 3</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            <?php else : ?>
                                <div class="alert alert-success">Terima kasih, Anda sudah mengisi kuesioner.</div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php echo view('template/footer'); ?>
                </div>
            </div>
        </div>
    </div>
</body>