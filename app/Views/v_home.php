<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-content-center align-items-center">
  <div class="container text-center" data-aos="zoom-in" data-aos-delay="100">
    <h1>Forum Data Storytelling Indonesia</h1>
    <h2>E-Learning Badan Pusat Statistik Kabupaten Tanah Laut</h2>
  </div>
</section><!-- End Hero -->

<main id="main">


<!-- ======= Modul Kelas Interaktif Section ======= -->
<section id="interaktif" class="why-us">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Kelas Interaktif</h2>
    </div>
    
    <div class="row justify-content-center">
      <?php if (!empty($interaktif) && is_array($interaktif)): ?>
        <?php foreach ($interaktif as $item): ?>
          <div class="col-lg-3 col-md-4 col-sm-6 mb-4 text-center">
            <div class="card p-3 shadow-sm">
              <?php if (!empty($item['gambar'])): ?>
                <a href="<?= base_url("foto/" . $item['gambar']) ?>" class="mfp-iframe" title="Zoom">
                  <img src="<?= base_url("foto/" . $item['gambar']) ?>" 
                       class="img-fluid rounded" 
                       alt="gambar" 
                       style="width: 100%; max-height: 250px; object-fit: cover;">
                </a>
              <?php else: ?>
                <p class="text-muted">Tidak ada gambar tersedia.</p>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="text-center">Tidak ada data interaktif tersedia.</p>
      <?php endif; ?>
    </div>
  </div>
</section>


<!-- ======= Modul Kelas Data Section ======= -->
<section id="modul-kelas" class="why-us">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Modul Kelas Data</h2>
    </div>
    
    <div class="row justify-content-center">
      <?php if (!empty($kelas)): ?>
        <?php foreach (array_slice($kelas, 0, 2) as $item): ?> 
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card-module text-center p-3 shadow-sm">
              <!-- Gambar Kelas -->
              <a href="<?= site_url('kelas/' . $item['id_kelas']) ?>">
                <img src="<?= base_url('foto/' . $item['gambar']) ?>" 
                     class="img-fluid" 
                     alt="Gambar Modul Kelas" 
                     style="border-radius: 8px;" />
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>



<?php
// Fungsi untuk mengambil ID video dari berbagai format URL YouTube
function extract_video_id($url) {
    $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/|youtube\.com\/shorts\/)([a-zA-Z0-9_-]{11})/';
    preg_match($pattern, $url, $matches);
    return isset($matches[1]) ? $matches[1] : null;
}
?>

<!-- ======= Storytelling Section ======= -->
<section id="storytelling" class="why-us">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Kelas Storytelling</h2>
    </div>
    
    <div class="row justify-content-center">
      <?php if (!empty($story)): ?>
        <?php $items = array_slice($story, 0, 3); ?>
        
        <!-- Tampilkan 1 gambar pertama -->
        <?php if (!empty($items[0]['gambar'])): ?>
          <div class="col-lg-5 col-md-7 col-sm-9 mb-4">
            <div class="card p-3 text-center shadow-sm">
              <a href="<?= site_url('story/' . $items[0]['id_story']) ?>">
                <img src="<?= base_url('foto/' . $items[0]['gambar']) ?>" 
                     class="img-fluid" 
                     alt="Gambar Modul Kelas" 
                     style="border-radius: 8px; max-height: 250px; width: 100%; object-fit: cover;" />
              </a>
            </div>
          </div>
        <?php endif; ?>
        
        <!-- Tampilkan 2 video berikutnya -->
        <?php for ($i = 1; $i < 3; $i++): ?>
          <?php if (!empty($items[$i])): ?>
            <?php $video_id = extract_video_id($items[$i]['youtube_link']); ?>
            <?php if ($video_id): ?>
              <div class="col-lg-5 col-md-7 col-sm-9 mb-4">
                <div class="card p-3 text-center shadow-sm">
                  <div class="video-wrapper">
                    <iframe 
                      src="https://www.youtube.com/embed/<?= $video_id ?>" 
                      frameborder="0" allowfullscreen>
                    </iframe>
                  </div>
                  <h5 class="mt-3">
                    <a href="<?= site_url('story/' . $items[$i]['id_story']) ?>" class="text-dark font-weight-bold" style="font-size: 16px;">
                      <?= $items[$i]['judul'] ?>
                    </a>
                  </h5>
                </div>
              </div>
            <?php else: ?>
              <p class="text-center text-danger">Video tidak dapat diputar.</p>
            <?php endif; ?>
          <?php endif; ?>
        <?php endfor; ?>
      <?php endif; ?>
    </div>
  </div>
</section>









<!-- Tambahkan CSS -->
<style>
  .video-wrapper {
    position: relative;
    width: 100%;
    max-width: 350px; /* Lebar maksimal video */
    margin: 0 auto;
  }

  .video-wrapper iframe {
    width: 100%;
    height: 200px; /* Tinggi lebih kecil agar proporsional */
    border-radius: 8px;
  }

  h5 {
    margin-top: 10px;
    font-size: 16px;
    font-weight: bold;
  }
</style>




<!-- ======= Kontak Kami Section ======= -->
<section id="contact" class="contact" style="background-color: #6495ED; color: white; padding: 1.5rem 0;">
  <div class="container text-center">
    <h2>Kontak Kami</h2>
    <p><i class="fa fa-phone"></i> <a href="https://wa.me/6251221313" class="text-white">+62 512 21313</a></p>
    <p><i class="fa fa-home"></i> Jalan A. Syairani No. 9 Pelaihari, Kab. Tanah Laut, Prov. Kalimantan Selatan 70814</p>
    <p><i class="fa fa-envelope"></i> <a href="mailto:bps6301@gmail.com" class="text-white">bps6301@gmail.com</a></p>
  </div>
</section>

<!-- ======= Google Maps Section ======= -->
<section id="maps" class="contact">
  <div data-aos="fade-up">
    <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15924.149593707116!2d114.76695707311693!3d-3.8019886033712766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de6f118a7a06139%3A0x542987be0cef1f00!2s5QXP%2B549%2C%20Angsau%2C%20Kec.%20Pelaihari%2C%20Kabupaten%20Tanah%20Laut%2C%20Kalimantan%20Selatan%2070815!5e0!3m2!1sid!2sid!4v1733099143173!5m2!1sid!2sid" frameborder="0" allowfullscreen loading="lazy"></iframe>
  </div>
</section>

</main><!-- End #main -->
