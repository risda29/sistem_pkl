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
								<h4 class="card-title">Modul Storytelling</h4>
								<button class="btn btn-info btn-round ml-auto" data-toggle="modal"
									data-target="#addRowModal">
									<i class="fa fa-plus"></i>
									Tambah
								</button>
							</div>
						</div>
						<div class="card-body">

							<!-- Modal Tambah Story -->
							<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">
												<span class="fw-mediumbold">Tambah StoryTeller</span>
											</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form method="POST" action="<?= base_url('Story/proses_tambah_story') ?>"
												enctype="multipart/form-data">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group">
															<label for="judul">Judul</label>
															<input id="judul" name="judul" type="text"
																class="form-control" placeholder="Masukkan judul"
																required>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label for="tanggal">Tanggal</label>
															<input id="tanggal" name="tanggal" type="date"
																class="form-control" required>
														</div>
													</div>

													<div class="col-sm-12">
														<div class="form-group">
															<label for="link_tree">Link Nareri</label>
															<input id="link_tree" name="link_tree" type="url"
																class="form-control" placeholder="Masukkan URL">
														</div>
													</div>

													<div class="col-md-12">
														<div class="form-group">
															<label for="gambar">Gambar</label>
															<input id="gambar" name="gambar" type="file"
																class="form-control" accept=".jpg, .jpeg, .png"
																required>
														</div>
													</div>

													<div class="col-sm-12">
														<div class="form-group">
															<label for="youtube_link">Link YouTube</label>
															<input id="youtube_link" name="youtube_link" type="url"
																class="form-control" placeholder="Masukkan URL YouTube">
														</div>
													</div>

													<div class="col-sm-12">
														<div class="form-group">
															<label for="tugas_link">Tugas</label>
															<input id="tugas_link" name="tugas_link" type="url"
																class="form-control"
																placeholder="Masukkan URL Google Form"
																pattern="https://.*" required>
														</div>
													</div>

													<div class="col-sm-12">
														<div class="form-group">
															<label for="respon_link">Link Respon</label>
															<input id="respon_link" name="respon_link" type="url"
																class="form-control"
																placeholder="Masukkan link respon Google Form atau Sheets">
														</div>
													</div>

													<div class="col-sm-12">
														<div class="form-group">
															<label for="artikel">Artikel</label>
															<textarea id="artikel" name="artikel" class="form-control"
																placeholder="Tulis artikel di sini..." rows="4"
																required></textarea>
														</div>
													</div>
												</div>

												<div class="modal-footer">
													<button type="submit" class="btn btn-info">Tambah</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>

							<div class="table-responsive">
								<table id="example" class="table table-bordered">
									<thead>
										<tr>
											<th>No</th>
											<th>Judul</th>
											<th>Tanggal</th>
											<th>Link Materi</th>
											<th>Artikel</th> <!-- Artikel Column -->
											<th>Gambar</th>
											<th>Video</th> <!-- Kolom baru untuk video -->
											<th>Tugas</th>
											<th>Respon</th>
											<th style="width: 10%">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php if (!empty($story)): ?>
											<?php foreach ($story as $key => $item): ?>
												<tr>
													<td><?= $key + 1; ?></td>
													<td><?= $item['judul']; ?></td>
													<td><?= date('d-m-Y', strtotime($item['tanggal'])); ?></td>
													<td>
														<?php if (!empty($item['link_tree'])): ?>
															<a href="<?= htmlspecialchars($item['link_tree']); ?>"
																target="_blank">Link</a>
														<?php else: ?>
															Tidak ada link
														<?php endif; ?>
													</td>
													


													<td class="artikel-column"><?= $item['artikel']; ?></td>
													</td>
													<td>
														<a href="<?= base_url('foto/' . $item['gambar']) ?>" class="mfp-iframe"
															title="Zoom">
															<img src="<?= base_url('foto/' . $item['gambar']) ?>" height="75px"
																width="100px" alt="gambar">
														</a>
													</td>
													<td>
														<?php if (!empty($item['youtube_link'])):
															// Ambil ID video dari link YouTube
															preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/|youtube\.com\/shorts\/)([\w-]+)/', $item['youtube_link'], $matches);
															$video_id = $matches[1] ?? '';

															// Cek jika ID video valid
															if (!empty($video_id)): ?>
																<iframe width="100" height="75"
																	src="https://www.youtube.com/embed/<?= htmlspecialchars($video_id, ENT_QUOTES, 'UTF-8') ?>"
																	frameborder="0"
																	allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
																	allowfullscreen></iframe>
															<?php else: ?>
																<p>Video tidak dapat diputar.</p>
															<?php endif; ?>
														<?php else: ?>
															Tidak ada video
														<?php endif; ?>
													</td>
													<td>

														<?php if (!empty($item['tugas_link'])): ?>
															<a href="<?= htmlspecialchars($item['tugas_link']); ?>"
																target="_blank">Klik untuk buka Google Form</a>
														<?php else: ?>
															Tidak ada tugas
														<?php endif; ?>
													</td>
													<td>
														<?php if (!empty($item['respon_link'])): ?>
															<a href="<?= htmlspecialchars($item['respon_link']); ?>"
																target="_blank">Lihat Respon</a>
														<?php else: ?>
															Tidak ada link respon
														<?php endif; ?>
													</td>
													<td>
														<div class="btn-group" role="group" aria-label="Basic example">
															<a href="#" class="btn btn-primary btn-sm edit-kelas"
																data-toggle="modal"
																data-target="#modalEdit<?= $item['id_story']; ?>" title="Edit">
																<i class="fa fa-edit"></i> Edit
															</a>
															<a href="#" class="btn btn-danger btn-sm hapus-kelas"
																data-toggle="modal"
																data-target="#modalHapus<?= $item['id_story']; ?>"
																title="Hapus">
																<i class="fa fa-trash"></i> Hapus
															</a>
														</div>
													</td>
												</tr>
											<?php endforeach; ?>
										<?php else: ?>
											<tr>
												<td colspan="10">Tidak ada story yang tersedia.</td>
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
											"data": "id"
										},
										{
											"data": "judul"
										},
										{
											"data": "tanggal"
										},
										{
											"data": "link_tree"
										},
										{
											"data": "artikel"
										},
										{
											"data": "slug"
										},
										{
											"data": "youtube_link"
										},
										{
											"data": "tugas_link"
										},
										{
											"data": "respon_link"
										},
										{
											"data": "gambar",
											"render": function (data, type, row) {
												return '<a href="' + data + '" class="mfp-iframe" title="Zoom"><img src="' + data + '" height="75px" width="100px" alt="gambar"></a>';
											}
										},
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
						<?php foreach ($story as $key => $item): ?>
							<div class="modal fade" id="modalEdit<?= $item['id_story']; ?>" tabindex="-1" role="dialog"
								aria-labelledby="modalEditLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header no-bd">
											<h5 class="modal-title">
												<span class="fw-mediumbold">Edit StoryTeller</span>
											</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form method="POST"
												action="<?= base_url('Story/update_story/' . $item['id_story']); ?>"
												enctype="multipart/form-data">
												<input type="hidden" name="id_story" value="<?= $item['id_story']; ?>">
												<input type="hidden" name="fotolama" value="<?= $item['id_story']; ?>">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label>Judul</label>
															<input name="judul" type="text" class="form-control"
																placeholder="judul"
																value="<?= isset($item['judul']) ? $item['judul'] : ''; ?>">
														</div>
													</div>

													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label>Link YouTube</label>
															<input id="youtube_link" name="youtube_link" type="url"
																class="form-control" placeholder="Masukkan URL YouTube"
																value="<?= isset($item['youtube_link']) ? $item['youtube_link'] : ''; ?>">
														</div>
													</div>

													<div class="col-md-6 pr-0">
														<div class="form-group form-group-default">
															<label>Tanggal</label>
															<input name="tanggal" type="date" class="form-control"
																placeholder="tanggal"
																value="<?= isset($item['tanggal']) ? $item['tanggal'] : ''; ?>">
														</div>
													</div>

													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label for="link_tree">Link Materi</label>
															<input id="link_tree" name="link_tree" type="text"
																class="form-control" placeholder="Link_Tree"
																value="<?= isset($item['link_tree']) ? $item['link_tree'] : ''; ?>">
														</div>
													</div>

													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label for="tugas_link">Tugas</label>
															<input id="tugas_link" name="tugas_link" type="text"
																class="form-control" placeholder="Tugas Link"
																value="<?= isset($item['tugas_link']) ? $item['tugas_link'] : ''; ?>">
														</div>
													</div>

													<!-- Respon Link -->
													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label for="respon_link">Respon Link</label>
															<input id="respon_link" name="respon_link" type="text"
																class="form-control" placeholder="Respon Link"
																value="<?= isset($item['respon_link']) ? $item['respon_link'] : ''; ?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group form-group-default">
															<label>Gambar</label>
															<!-- Sama seperti file PDF, input type=file tidak mendukung value untuk gambar -->
															<input type="file" name="gambar" accept=".jpg, .jpeg, .png">
														</div>
													</div>

													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label>Artikel</label>
															<textarea id="artikel" name="artikel"
																class="form-control ckeditor" required
																placeholder=""><?= isset($item['artikel']) ? $item['artikel'] : ''; ?></textarea>

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
					<?php foreach ($story as $key => $item): ?>
						<div class="modal fade" id="modalHapus<?= $item['id_story']; ?>" tabindex="-1" role="dialog"
							aria-labelledby="modalHapusLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-body">
										Apakah Anda yakin ingin menghapus storyteller ini?
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
										<a href="<?= base_url('story/hapus/' . $item['id_story']); ?>"
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
				return ${ year } -${ month } -${ day };
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