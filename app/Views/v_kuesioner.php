<?php echo view('template/header'); ?>

<body>
    <?php echo view('template/sidebar'); ?>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="col-md-12">
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('success'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <!-- Table Kelola User -->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Kuesioner</h4>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-info btn-round ml-auto" data-toggle="modal" data-target="#addQuestionModal">
                                <i class="fa fa-plus"></i> Tambah
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Pertanyaan</th>
                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <!-- <tbody>
                                    <?php foreach ($kuesioner as $index => $item) : ?>
                                        <tr>
                                            <td><?= esc($index + 1) ?></td>
                                            <td><?= esc($item['pertanyaan']) ?></td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit<?= $item['id_kuesioner']; ?>">Edit</a>
                                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus<?= $item['id_kuesioner']; ?>">Hapus</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <strong>Statistik Jawaban:</strong>
                                                <ul>
                                                    
                                                    <?php // sesuaikan jumlahnya dengan poin di pertanyaan nya
                                                    for ($i = 1; $i <= 3; $i++) : ?>
                                                        <li>Poin <?= $i ?>: <?= $statistik[$item['id_kuesioner']][$i] ?? 0 ?> orang</li>
                                                    <?php endfor; ?>
                                                </ul>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody> -->
                                <tbody>
                                    <?php foreach ($kuesioner as $index => $item) : ?>
                                        <tr>
                                            <td><?= esc($index + 1) ?></td>
                                            <td><?= esc($item['pertanyaan']) ?></td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit<?= $item['id_kuesioner']; ?>">Edit</a>
                                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus<?= $item['id_kuesioner']; ?>">Hapus</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <canvas id="chart<?= $item['id_kuesioner'] ?>" width="50" height="25"></canvas>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

                <!-- Modal Tambah Pertanyaan -->
                <div class="modal fade" id="addQuestionModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">Tambah Pertanyaan</span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="<?= base_url('Kuesioner/tambah') ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="pertanyaan">Pertanyaan</label>
                                        <input id="pertanyaan" name="pertanyaan" type="text" class="form-control" placeholder="Isi lah Pertanyaan Mengenai Kuesioner ini" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit Pertanyaan -->
                <?php foreach ($kuesioner as $item) : ?>
                    <div class="modal fade" id="modalEdit<?= $item['id_kuesioner']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold">Edit Pertanyaan</span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="<?= base_url('Kuesioner/edit/' . $item['id_kuesioner']) ?>" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="pertanyaan">Pertanyaan</label>
                                            <input id="pertanyaan" name="pertanyaan" type="text" class="form-control" value="<?= esc($item['pertanyaan']) ?>" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- Modal Hapus Pertanyaan -->
                <?php foreach ($kuesioner as $item) : ?>
                    <div class="modal fade" id="modalHapus<?= $item['id_kuesioner']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold">Hapus Pertanyaan</span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah Anda yakin ingin menghapus pertanyaan ini?</p>
                                    <form method="POST" action="<?= base_url('Kuesioner/hapus/' . $item['id_kuesioner']) ?>" enctype="multipart/form-data">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>

   
    </div>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        <?php foreach ($kuesioner as $item) : ?>
            var ctx = document.getElementById("chart<?= $item['id_kuesioner'] ?>").getContext("2d");
            new Chart(ctx, {
                type: 'bar',
                data: {
                    // sesuaikan jumlahnya dengan poin di pertanyaan nya
                    labels: ['Poin 1', 'Poin 2', 'Poin 3', 'Poin 4'],
                    datasets: [{
                        label: 'Jumlah Responden',
                        data: [
                            <?= $statistik[$item['id_kuesioner']][1] ?? 0 ?>,
                            <?= $statistik[$item['id_kuesioner']][2] ?? 0 ?>,
                            <?= $statistik[$item['id_kuesioner']][3] ?? 0 ?>,
                            <?= $statistik[$item['id_kuesioner']][4] ?? 0 ?>
                        ],
                        backgroundColor: ['#4CAF50', '#FFC107', '#F44336', '#F44336'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah Responden'
                            },
                            ticks: {
                                stepSize: 1, // Supaya naiknya per 1 angka
                                callback: function(value, index, values) {
                                    return Number.isInteger(value) ? value : null; // Hanya tampilkan bilangan bulat
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        <?php endforeach; ?>
    });
</script>

		<?php echo view('template/footer'); ?>
</body>