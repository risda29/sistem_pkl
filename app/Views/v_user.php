<?php echo view('template/header'); ?>

<body>
    <?php echo view('template/sidebar'); ?>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="col-md-12">
                    <!-- Table Kelola User -->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Kelola User</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
                                <table id="userTable" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Nama Lengkap</th>
                                            <th>Tempat dan Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>Kabupaten</th>
                                            <th>Provinsi</th>
                                            <th>No Whatsapp</th>
                                            <th>Pekerjaan</th>
                                            <th>Asal Instansi/Institusi</th>
                                            <th>Bidang Pekerjaan/Jurusan</th>
                                            <th>Kelas Interaktif</th>
                                            <th>Manfaat</th>
                                            <th>Level User</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($user)): ?>
                                            <?php foreach ($user as $key => $user): ?>
                                                <tr>
                                                    <td><?= $key + 1; ?></td>
                                                    <td><?= esc($user['username']); ?></td>
                                                    <td><?= esc($user['email']); ?></td>
                                                    <td><?= esc($user['nama']); ?></td>
                                                    <td><?= esc($user['ttl']); ?></td>
                                                    <td><?= esc($user['alamat']); ?></td>
                                                    <td><?= esc($user['kabupaten']); ?></td>
                                                    <td><?= esc($user['provinsi']); ?></td>
                                                    <td><?= esc($user['telepon']); ?></td>
                                                    <td><?= esc($user['pekerjaan']); ?></td>
                                                    <td><?= esc($user['instansi']); ?></td>
                                                    <td><?= esc($user['bidang']); ?></td>
                                                    <td><?= esc($user['ikutikelas']); ?></td>
                                                    <td><?= esc($user['manfaat']); ?></td>
                                                    <td><?= esc($user['leveluser']); ?></td>
                                                    <td>
                                                        <?php if ($user['status'] == 'Setujui'): ?>
                                                            <span class="badge badge-success">Disetujui</span>
                                                        <?php elseif ($user['status'] == 'Tolak'): ?>
                                                            <span class="badge badge-danger">Ditolak</span>
                                                        <?php else: ?>
                                                            <span class="badge badge-warning">Menunggu</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($user['status'] == 'Menunggu'): ?>

                                                            <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                                data-target="#modalTolak<?= $user['id_user']; ?>">
                                                                <i class="fa fa-times"></i> Tolak
                                                            </button>
                                                            <button class="btn btn-success btn-sm" data-toggle="modal"
                                                                data-target="#modalSetujui<?= $user['id_user']; ?>">
                                                                <i class="fa fa-check"></i> Setuju
                                                            </button>
                                                        <?php else: ?>
                                                            <i>Disable</i>
                                                        <?php endif; ?>

                                                    </td>
                                                </tr>

                                                <!-- Modal Setuju -->
                                                <div class="modal fade" id="modalSetujui<?= $user['id_user']; ?>" tabindex="-1"
                                                    role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Konfirmasi Setuju</h5>
                                                                <button type="button" class="close" data-dismiss="modal">
                                                                    <span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <form
                                                                action="<?= base_url('KelolaUser/setujuiUser/' . $user['id_user']); ?>"
                                                                method="POST">
                                                                <div class="modal-body">
                                                                    <p>Apakah Anda yakin ingin menyetujui pengguna ini?</p>
                                                                    <div class="form-check">
                                                                        <input type="checkbox"
                                                                            class="form-check-input setujui-check"
                                                                            id="setujuiCheck<?= $user['id_user']; ?>">
                                                                        <label class="form-check-label"
                                                                            for="setujuiCheck<?= $user['id_user']; ?>">Saya
                                                                            setuju</label>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-success setujui-btn"
                                                                        id="setujuiBtn<?= $user['id_user']; ?>">Setuju</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal Tolak -->
                                                <div class="modal fade" id="modalTolak<?= $user['id_user']; ?>" tabindex="-1"
                                                    role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Konfirmasi Tolak</h5>
                                                                <button type="button" class="close" data-dismiss="modal">
                                                                    <span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <form
                                                                action="<?= base_url('KelolaUser/tolakUser/' . $user['id_user']); ?>"
                                                                method="POST">
                                                                <div class="modal-body">
                                                                    <p>Apakah Anda yakin ingin menolak pengguna ini?</p>
                                                                    <div class="form-check">
                                                                        <input type="checkbox"
                                                                            class="form-check-input tolak-check"
                                                                            id="tolakCheck<?= $user['id_user']; ?>">
                                                                        <label class="form-check-label"
                                                                            for="tolakCheck<?= $user['id_user']; ?>">Saya
                                                                            setuju</label>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-danger tolak-btn"
                                                                        id="tolakBtn<?= $user['id_user']; ?>">Tolak</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="15">Tidak ada data pengguna.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Table History Status Baca -->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">History Status Baca</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
                                <table id="statusBacaTable" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Level User</th>
                                            <th>Judul Kelas</th>
                                            <th>Judul Story</th>
                                            <th>Status</th>
                                            <th>Waktu Baca</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($status_baca)): ?>
                                            <?php foreach ($status_baca as $key => $item): ?>
                                                <tr>
                                                    <td><?= $key + 1; ?></td>
                                                    <td><?= esc($item['username']); ?></td>
                                                    <td><?= esc($item['email']); ?></td>
                                                    <td><?= esc($item['leveluser']); ?></td>
                                                    <td><?= esc($item['judul_kelas']); ?></td>
                                                    <td><?= esc($item['judul_story']); ?></td>
                                                    <td>
                                                        <?php if ($item['status'] == 'sudah terbaca'): ?>
                                                            <span class="badge badge-success">Sudah Terbaca</span>
                                                        <?php else: ?>
                                                            <span class="badge badge-danger">Belum Terbaca</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?= esc($item['waktu_baca']); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="8">Tidak ada data status baca.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php echo view('template/footer'); ?>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Aktifkan tombol Setuju hanya jika checkbox dicentang
            document.querySelectorAll(".setuju-check").forEach(function (checkbox) {
                checkbox.addEventListener("change", function () {
                    document.getElementById("setujuBtn" + this.id.replace("setujuCheck", "")).disabled = !this.checked;
                });
            });

            // Aktifkan tombol Tolak hanya jika checkbox dicentang
            document.querySelectorAll(".tolak-check").forEach(function (checkbox) {
                checkbox.addEventListener("change", function () {
                    document.getElementById("tolakBtn" + this.id.replace("tolakCheck", "")).disabled = !this.checked;
                });
            });
        });
    </script>
</body>

</html>