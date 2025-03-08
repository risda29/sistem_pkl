<?php echo view('template/header'); ?>

<body>
    <?php echo view('template/sidebar_pengguna'); ?>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Kuesioner</h4>
                        </div>
                        <?php if (session()->has('message')): ?>
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <?= session('message') ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <form method="POST" action="<?= base_url('Kuesioner_p/simpanJawaban') ?>" id="kuesionerForm">
                                <?php foreach ($kuesioner as $index => $item): ?>
                                    <div class="card mb-3 shadow-sm">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <?= esc($index + 1) . ". " . esc($item['pertanyaan']) ?>
                                            </h5>
                                            <input type="hidden" name="id_kuesioner[<?= $item['id_kuesioner'] ?>]" value="<?= $item['id_kuesioner'] ?>">
                                            <input type="hidden" name="id_user[<?= $item['id_kuesioner'] ?>]" value="<?= session()->get('id_user') ?>">
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
                                    <button type="submit" class="btn btn-primary" id="submitBtn" disabled>Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php echo view('template/footer'); ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("kuesionerForm");
            const submitBtn = document.getElementById("submitBtn");
            const radioGroups = form.querySelectorAll("input[type='radio']");
            
            function checkCompletion() {
                const questions = new Set();
                radioGroups.forEach(radio => {
                    if (radio.checked) {
                        questions.add(radio.name);
                    }
                });
                submitBtn.disabled = questions.size !== <?= count($kuesioner) ?>;
            }
            
            radioGroups.forEach(radio => {
                radio.addEventListener("change", checkCompletion);
            });
        });
    </script>
</body>