<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Website E- Learning BPS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="<?= base_url('logo/tanahlaut.jpg') ?>" type="image/x-icon">
  <link href="<?= base_url('frontend') ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">


  <!-- Vendor CSS Files -->
  <link href="<?= base_url('frontend') ?>/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= base_url('frontend') ?>/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url('frontend') ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('frontend') ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url('frontend') ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('frontend') ?>/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url('frontend') ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?= base_url('frontend') ?>/assets/css/style.css" rel="stylesheet">
  
  <link rel="stylesheet" href="<?= base_url('public/frontend/assets/css/stylesheet.css') ?>">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <h2 class="logo me-auto" style="font-size: 19px; color: black;">
        <a href="<?= base_url('Home') ?>" style="text-decoration: none; color: black;">
          <img src="<?= base_url('logo/tanahlaut.jpg') ?>" width="30px" style="margin-right: 20px;"> E- Learning BPS
        </a>
      </h2>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-item nav-link" href="<?= base_url('/home') ?>">Beranda</a></li>
          <!-- <li><a href="<?= base_url("VisiMisi/tampilvisimisi") ?>"><span>Visi & Misi</span></a></li> -->
          <li><a href="<?= base_url("Story/tampilstory") ?>"><span>Kelas Storytelling</span></a></li>
          <li><a href="<?= base_url("Kelas/tampilkelas") ?>"><span>Kelas Data</span></a></li>
          <li><a href="<?= base_url("VisiMisi/tampilvisimisi") ?>"><span>Tentang Kami</span></a></li>
          <!-- <li class="dropdown"><a href="#"><span>Tentang</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?= base_url("VisiMisi/tampilvisimisi") ?>"><span>Visi & Misi</span></a></li>
              <li><a href="<?= base_url("StrukturOrganisasi/tampilgambarstruktur") ?>"><span>Struktur
                    Organisasi</span></a></li>
            </ul> -->
          </li>
          
          <!-- <li><a class="nav-item nav-link" href="<?= base_url('#story') ?>">Storytelling</a></li> -->
          <!-- <li class="dropdown"><a href="#"><span>Kelas StoryTeller</span> <i class="bi bi-chevron-down"></i></a> -->
           
           
            <i class="bi bi-list mobile-nav-toggle"></i>
          </li>
          <!-- <li><a class="nav-item nav-link" href="<?= base_url('#contact') ?>">Karya Kami</a></li> -->
      </nav><!-- .navbar -->
      <div>
      <!-- <a href="<?= base_url('Login') ?>" class="get-started-btn">Login</a> -->
    </div>
    <div>
    <a href="<?= site_url('/register')  ?>" class="get-started-btn">Ikuti Kelas</a>

    </div>
    
    
    
</header>

  </header>

  <?php if ($page) {
    echo view($page);
  } ?>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('frontend') ?>/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?= base_url('frontend') ?>/assets/vendor/aos/aos.js"></script>
  <script src="<?= base_url('frontend') ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('frontend') ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url('frontend') ?>/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('frontend') ?>/assets/js/main.js"></script>

</body>

</html>