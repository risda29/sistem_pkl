<?php echo view('template/header'); ?>

<body>

    <?php echo view('template/sidebar_pengguna'); ?>
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
                                <form action="<?= base_url('Profil_Pengguna/edit_profil_pengguna'); ?>" method="POST">
                                    <div class="form-container">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input id="username" name="username" type="text" class="form-control"
                                                required placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input id="email" name="email" type="email" class="form-control" required
                                                placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input id="password" name="password" type="password" class="form-control"
                                                required placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap</label>
                                            <input id="nama" name="nama" type="text" class="form-control" required
                                                placeholder="Nama Lengkap">
                                        </div>
                                        <div class="form-group">
                                            <label for="ttl">Tempat dan Tanggal Lahir</label>
                                            <input id="ttl" name="ttl" type="text" class="form-control" required
                                                placeholder="Tempat dan Tanggal Lahir">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input id="alamat" name="alamat" type="text" class="form-control" required
                                                placeholder="Alamat">
                                        </div>
                                        <div class="form-group">
                                            <label for="kabupaten">Kabupaten</label>
                                            <input id="kabupaten" name="kabupaten" type="text" class="form-control"
                                                required placeholder="kabupaten">
                                        </div>
                                        <div class="form-group">
                                            <label for="provinsi">Provinsi</label>
                                            <input id="provinsi" name="provinsi" type="text" class="form-control"
                                                required placeholder="Provinsi">
                                        </div>
                                        <div class="form-group">
                                            <label for="telepon">No Whatsapp</label>
                                            <input id="telepon" name="telepon" type="tel" class="form-control" required
                                                placeholder="No Whatsapp">
                                        </div>
                                        <div class="form-group">
                                            <label for="pekerjaan">Pilih Pekerjaan</label>
                                            <select id="pekerjaan" name="pekerjaan" class="form-control" required>
                                                <option value="">Pilih Pekerjaan</option>
                                                <option value="Pelajar">Pelajar</option>
                                                <option value="Mahasiswa">Mahasiswa</option>
                                                <option value="ASN/PNS">ASN/PNS</option>
                                                <option value="Pegawai/Karyawan Swasta">Pegawai/Karyawan Swasta</option>
                                                <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="instansi">Asal Instansi/Institusi</label>
                                            <input id="instansi" name="instansi" type="text" class="form-control"
                                                required placeholder="Asal Instansi/Institusi">
                                        </div>
                                        <div class="form-group">
                                            <label for="bidang">Bidang pekerjaan/jurusan</label>
                                            <input id="bidang" name="bidang" type="text" class="form-control" required
                                                placeholder="Bidang pekerjaan/jurusan">
                                        </div>
                                        <div class="form-group">
                                            <label for="ikutikelas">Ingin mengikuti kelas interaktif?</label>
                                            <select name="ikutikelas" id="ikutikelas" class="form-control">
                                                <option value="ya">Ya</option>
                                                <option value="tidak">Tidak</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="manfaat">Harapan Mengikuti Kelas Interaktif?</label>
                                            <input id="manfaat" name="manfaat" type="text" class="form-control" required
                                                placeholder="Harapan Mengikuti Kelas Interaktif?">
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