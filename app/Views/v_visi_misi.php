<?php echo view('template/header'); ?>

<body>
	<?php echo view('template/sidebar'); ?>

	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<!-- Tampilkan pesan sukses jika ada -->
				<?php if (session()->get('success')): ?>
					<div class="alert alert-info alert-dismissible fade show" role="alert">
						<?= session()->get('success') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<br>
					</div>
				<?php endif; ?>

				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Visi dan Misi</h4>
							</div>
						</div>
						<div class="card-body">
							<div class="col-md-12">
								<div id="modeBacaSaja">
									<div class="form-group">
										<label for="visi">Visi</label>
										<div class="form-control" id="visi" name="visi" readonly>
											<?= $visiData['visi']; ?>
										</div>
									</div>
									<div class="form-group">
										<label for="misi">Misi</label>
										<div class="form-control" id="misi" name="misi" readonly>
											<?= $visiData['misi']; ?>
										</div>
									</div>
									<br>
									<div class="text-right">
										<button type="button" id="tombolEdit" class="btn btn-info" data-toggle="modal"
											data-target="#modalEdit">Edit</button>
									</div>
								</div>
								<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog"
									aria-labelledby="modalEditLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="modalEditLabel">Edit Data</h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form
													action="<?= base_url('VisiMisi/updateVisiMisi/' . $visiData['idvisimisi']); ?>"
													method="POST" id="formEditVisiMisi">
													<div class="form-group">
														<label for="visi">Visi</label>
														<textarea class="form-control" id="editor" name="visi"
															rows="3"><?= $visiData['visi']; ?></textarea>
													</div>
													<div class="form-group">
														<label for="misi">Misi</label>
														<textarea class="form-control" id="editor1" name="misi"
															rows="3"><?= $visiData['misi']; ?></textarea>
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace('editor');
	CKEDITOR.replace('editor1');
</script>
<?php echo view('template/footer'); ?>

</html>