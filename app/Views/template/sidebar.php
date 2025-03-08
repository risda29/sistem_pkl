<body>
	<div class="wrapper">
		<div class="main-header" data-background-color="light-blue">
			<!-- Logo Header -->
			<div class="logo-header">

				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
					data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">

				<div class="container-fluid">
					<div class="collapse" id="search-nav">

						<div class="input-group">
							<div class="input-group-prepend">
								<a style="color :  white; font-weight:bold;">E-Learning BPS Tanah Laut</a>
							</div>
						</div>
					</div>
					</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar">

			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">

					<div class="user">
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span href="<?= base_url('Profil') ?>">
									<span>
										<h3><?= session()->get('username') ?></h3>
										<span class="user-level text-center"><?= session()->get('leveluser') ?>
										</span>
										<span class="caret"></span>
									</span>

							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="<?= base_url('Profil') ?>">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>



					<ul class="nav">
						<li class="nav-item">
							<a href="<?= base_url('Admin') ?>">
								<i class="fa fa-columns" aria-hidden="true"></i> <!-- Ikon untuk Dashboard -->
								<p>Dashboard</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="<?= base_url('Kelas') ?>">
								<i class="fa fa-folder" aria-hidden="true"></i>
								<p>Modul Kelas Data</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('Story') ?>">
								<i class="fa fa-book-open" aria-hidden="true"></i> <!-- Ikon untuk Story Teller -->
								<p>Modul Story Teller</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('Interaktif') ?>">
								<i class="fa fa-id-badge" aria-hidden="true"></i>
								<p>Kelas Interaktif</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('VisiMisi') ?>">
								<i class="fa fa-paint-brush" aria-hidden="true"></i> <!-- Ikon untuk Karya Kami -->
								<p>Kelola Visi Misi</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('KelolaUser') ?>">
								<i class="fa fa-user-circle" aria-hidden="true"></i>
								<p>Kelola User</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('Kuesioner') ?>">
								<i class="fa fa-user-circle" aria-hidden="true"></i>
								<p>Kuesioner</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('Login/logout') ?>">
								<p>Logout</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>


		<!--   Core JS Files   -->
		<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
		<script src="../assets/js/core/popper.min.js"></script>
		<script src="../assets/js/core/bootstrap.min.js"></script>
		<!-- jQuery UI -->
		<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
		<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
		<!-- jQuery Scrollbar -->
		<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
		<!-- Moment JS -->
		<script src="../assets/js/plugin/moment/moment.min.js"></script>
		<!-- Chart JS -->
		<script src="../assets/js/plugin/chart.js/chart.min.js"></script>
		<!-- jQuery Sparkline -->
		<script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
		<!-- Chart Circle -->
		<script src="../assets/js/plugin/chart-circle/circles.min.js"></script>
		<!-- Datatables -->
		<script src="../assets/js/plugin/datatables/datatables.min.js"></script>
		<!-- Bootstrap Notify -->
		<script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
		<!-- Bootstrap Toggle -->
		<script src="../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
		<!-- jQuery Vector Maps -->
		<script src="../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
		<script src="../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>
		<!-- Google Maps Plugin -->
		<script src="../assets/js/plugin/gmaps/gmaps.js"></script>
		<!-- Sweet Alert -->
		<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>
		<!-- Azzara JS -->
		<script src="../assets/js/ready.min.js"></script>
		<!-- Azzara DEMO methods, don't include it in your project! -->
		<script src="../assets/js/setting-demo.js"></script>
		<script src="../assets/js/demo.js"></script>
		<script>
			$('#datepicker').datetimepicker({
				format: 'MM/DD/YYYY',
			});
		</script>
		<!-- Add this line in the head section -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
		<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
		<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
		<script>
			new DataTable('#example');
		</script>

</body>

</html>