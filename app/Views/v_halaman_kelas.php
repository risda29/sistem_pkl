<main id="main"> 
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in" style="background-color: #6495ED; color: #fff;">
    <div class="container">
        <br>
        <h2>Kelas Data</h2>
        <!-- <p>Desa bati-Bati, Kecamatan Bati-Bati, Tanah Laut, Kalimantan Selatan, Indonesia. </p> -->
    </div>
</div>

    <section id="story" class="why-us">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        

      <div class="section-content">
  <div class="container text-center">
    <h2 class="section-title">Modul Kelas Data</h2>
    <div class="row justify-content-center">
       <!-- Loop foreach untuk setiap story -->
      <?php foreach ($kelas as $item): ?>
        <div class="col-lg-2 col-md-4 col-sm-6">
          <div class="card-module">
            <!-- Gambar Berita -->
            <a href="<?= site_url('kelas/' . $item['id_kelas']) ?>">
              <img src="<?= base_url('foto/' . $item['gambar']) ?>" 
                   class="img-fluid" 
                   alt="<?= $item['judul'] ?>" 
                   style="border-radius: 5px;" />
            </a>
            <!-- Judul Berita -->
            <h4 style="margin-top: 50px;">
              <a href="<?= site_url('kelas/' . $item['id_kelas']) ?>" 
                 style="color: black; text-decoration: none; font-weight: bold;">
                <?= $item['judul'] ?>
              </a>
            </h4>
          </div>
        </div>
      <?php endforeach; ?>
