<?php echo view('template/header'); ?>
<body>
	<?php echo view('template/sidebar'); ?>
	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div class="row">
					<div class="col-sm-6 col-md-6">
					</div>
					<div class="col-sm-6 col-md-6">
					</div>
				</div>

				<?php if (session()->has('message')): ?>
					<div class="alert alert-info alert-dismissible fade show" role="alert">
						<?= session('message') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif; ?>
			
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Tentang Kami</h4>
								<button class="btn btn-info btn-round ml-auto" data-toggle="modal"
									data-target="#addRowModal">
									<i class="fa fa-plus"></i>
									Tambah
								</button>
							</div>
						</div>
						<div class="card-body">
							<!-- Modal tambah-->
							<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header no-bd">
											<h5 class="modal-title">
												<span class="fw-mediumbold">
													Tambah</span>
												<span class="fw-light">
													Tentang Kami
												</span>
											</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form method="POST" action="<?= base_url('Karya/proses_tambah_karya') ?>"
												enctype="multipart/form-data">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label>Visi</label>
															<input id="visi" name="visi" type="text"
																class="form-control" placeholder="visi" required>
														</div>
													</div>
													<div class="col-md-6 pr-0">
														<div class="form-group form-group-default">
															<label>Misi</label>
															<input id="misi" name="misi" type="date"
																class="form-control" placeholder="misi" required>
														</div>
													</div>
													<div class="col-sm-12">
															<div class="form-group form-group-default">
																<label>Deskripsi</label>
																<input id="deskripsi" name="deskripsi" type="text" 
																class="form-control" placeholder="deskripsi">
															</div>
														</div>
													
												</div>
										</div>
										<div class="modal-footer no-bd">
											<button type="submit" id="addRowButton" class="btn btn-info">Tambah</button>
										</div>
										</form>
									</div>
								</div>
							</div>

							<div class="table-responsive">
    <table id="example" class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>visi</th>
                <th>misi</th>
                <th>Deskripsi</th> <!-- Kolom baru untuk Deskripsi -->
                <th style="width: 10%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($tentangkami)): ?>
                <?php foreach ($tentangkami as $key => $item): ?>
                    <tr>
                        <td>
                            <?= $key + 1; ?>
                        </td>
                        <td>
                            <?= $item['visi']; ?>
                        </td>
                        <td>
                            <?= date('d-m-Y', strtotime($item['misi'])); ?>
                        </td>
                        <!-- <td>
                           
                        </td> -->
                        
                        <!-- <td>
                            
                            </a>
                        </td> -->

                        <td>
                            <?php if (!empty($item['youtube_link'])): ?>
                                <iframe width="100" height="75" src="https://www.youtube.com/embed/<?= parse_url($item['youtube_link'], PHP_URL_PATH); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <?php else: ?>
                                Tidak ada video
                            <?php endif; ?>
                        </td>

                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="#" class="btn btn-primary btn-sm edit-kelas" data-toggle="modal" data-target="#modalEdit<?= $item['id_tentang']; ?>" title="Edit">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="#" class="btn btn-danger btn-sm hapus-kelas" data-toggle="modal" data-target="#modalHapus<?= $item['id_tentang']; ?>" title="Hapus">
                                    <i class="fa fa-trash"></i> Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Tidak ada kelas yang tersedia.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

									<script>
										$(document).ready(function () {
											$('#add-row').DataTable({
												"serverSide": true,
												"ajax": {
													"url": "url_ke_server_side_script", // Ganti dengan URL skrip server-side Anda
													"type": "POST"
												},
												"columns": [{
													"data": "id_tentang"
												},
												{
													"data": "visi"
												},
												{
													"data": "misi"
												},
												{
													"data": "deskripsi"
												},
												// {
												// 	"data": "gambar",
												// 	"render": function (data, type, row) {
												// 		return '<a href="' + data + '" class="mfp-iframe" title="Zoom"><img src="' + data + '" height="75px" width="100px" alt="gambar"></a>';
												// 	}
												// },
												{
													"data": null,
													"render": function (data, type, row) {
														return '<div class="btn-group" role="group" aria-label="Basic example">' +
															'<a href="#" class="btn btn-primary btn-sm edit-kelas" data-toggle="modal" data-target="#modalEdit' + row.id_kelas + '" title="Edit">' +
															'<i class="fa fa-edit"></i> Edit' +
															'</a>' +
															'<a href="#" class="btn btn-danger btn-sm hapus-kelas" data-toggle="modal" data-target="#modalHapus' + row.id_kelas + '" title="Hapus">' +
															'<i class="fa fa-trash"></i> Hapus' +
															'</a>' +
															'</div>';
													}
												}
												]
											});
										});
									</script>

								</table>
							</div>
							<!-- modal edit -->
							<?php foreach ($tentangkami as $key => $item): ?>
								<div class="modal fade" id="modalEdit<?= $item['id_tentang']; ?>" tabindex="-1" role="dialog"
									aria-labelledby="modalEditLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header no-bd">
												<h5 class="modal-title">
													<span class="fw-mediumbold">
														Edit</span>
													<span class="fw-light">
														Karya
													</span>
												</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form method="POST"
													action="<?= base_url('Karya/update_karya/' . $item['id_tentang']); ?>"
													enctype="multipart/form-data">
													<input type="hidden" name="id_tentang"
														value="<?= $item['id_tentang']; ?>">
													<input type="hidden" name="fotolama" value="<?= $item['id_tentang']; ?>">
													<div class="row">
													<div class="col-sm-12">
    <div class="form-group form-group-default">
        <label>visi</label>
        <input name="visi" type="text" class="form-control"
            placeholder="visi" value="<?= isset($item['visi']) ? $item['visi'] : ''; ?>">
    </div>
</div>

<div class="col-sm-12">
    <div class="form-group form-group-default">
        <label>Deskripsi</label>
        <input id="youtube_link" name="youtube_link" type="url" 
            class="form-control" placeholder="Masukkan URL YouTube"
            value="<?= isset($item['youtube_link']) ? $item['youtube_link'] : ''; ?>">
    </div>
</div>

<div class="col-md-6 pr-0">
    <div class="form-group form-group-default">
        <label>misi</label>
        <input name="misi" type="date" class="form-control"
            placeholder="misi" value="<?= isset($item['misi']) ? $item['misi'] : ''; ?>">
    </div>
</div>

														
														
													
													<div class="modal-footer no-bd">
														<button type="submit" id="update"
															class="btn btn-info">Simpan</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>

						<!-- Modal Hapus -->
						<?php foreach ($tentangkami as $key => $item): ?>
							<div class="modal fade" id="modalHapus<?= $item['id_tentang']; ?>" tabindex="-1" role="dialog"
								aria-labelledby="modalHapusLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-body">
											Apakah Anda yakin ingin menghapus karya kami ini?
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
											<a href="<?= base_url('Karya/hapus_karya/' . $item['id_tentang']); ?>"
												class="btn btn-danger">Hapus</a>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
						</tbody>
						</table>
					</div>
				</div>
			</div>

			<script>
				// Fungsi untuk mendapatkan tanggal hari ini
				function getTanggalHariIni() {
					const today = new Date();
					const year = today.getFullYear();
					const month = String(today.getMonth() + 1).padStart(2, '0');
					const day = String(today.getDate()).padStart(2, '0');
					return ${year}-${month}-${day};
				}

				// Fungsi untuk mengisi input tanggal dengan tanggal hari ini
				function isiTanggalHariIni() {
					const tanggalInput = document.getElementById('tanggal');
					tanggalInput.value = getTanggalHariIni();
				}

				// Panggil fungsi isiTanggalHariIni saat halaman dimuat
				window.onload = isiTanggalHariIni;

				// Fungsi untuk menyimpan perubahan (di sini Anda dapat menambahkan logika penyimpanan ke server)
				function simpanPerubahan() {
					// Ambil data dari formulir, termasuk tanggal yang sudah diisi otomatis
					const form = document.getElementById('formEditData');
					const formData = new FormData(form);

					// Lakukan sesuatu dengan data ini (misalnya, kirim ke server menggunakan AJAX)
					// ...

					// Contoh: Log data ke konsol
					console.log('Data yang akan disimpan:', Object.fromEntries(formData));
				}
			</script>
			<script>
				$(document).ready(function () {
					$('#add-row').magnificPopup({
						delegate: 'a',
						type: 'image',
						gallery: {
							enabled: true
						}
					});
				});
			</script>
			<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
			<script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
			<script>
				CKEDITOR.replace('artikel');
			</script>
			<?php echo view('template/footer'); ?>
</body>
