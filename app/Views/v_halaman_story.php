<main id="main"> 
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in" style="background-color: #6495ED; color: #fff;">
    <div class="container">
        <br>
        <h2>Kelas Storytelling</h2>
        <!-- <p>Desa bati-Bati, Kecamatan Bati-Bati, Tanah Laut, Kalimantan Selatan, Indonesia. </p> -->
    </div>
</div>

   
    <section id="story" class="why-us">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        

      <div class="section-content">
  <div class="container text-center">
    <h2 class="section-title">Modul Kelas Storytelling</h2>
    <div class="row justify-content-center">
                    <!-- Loop foreach untuk setiap story -->
                    <?php foreach ($story as $item): ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            <div class="card-module">
                                <!-- Cek jika ada link YouTube -->
                                <div class="video-container" style="margin-bottom: 10px;">
                                    <?php if (!empty($item['youtube_link'])): ?>
                                        <?php 
                                        // Mengambil ID video
                                        $video_id = extract_video_id($item['youtube_link']);
                                        // Cek jika ID video valid
                                        if (!empty($video_id)): ?>
                                            <iframe width="100%" height="200" 
                                                    src="https://www.youtube.com/embed/<?= $video_id ?>" 
                                                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                            </iframe>
                                        <?php else: ?>
                                            <p>Video tidak dapat diputar.</p>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>

                                <!-- Judul Berita -->
            <h4 style="margin-top: 50px;">
              <a href="<?= site_url('story/' . $item['id_story']) ?>" 
                 style="color: black; text-decoration: none; font-weight: bold;">
                <?= $item['judul'] ?>
              </a>
            </h4>
          </div>
        </div>
      <?php endforeach; ?>

    <!-- Percaya Gak? Section -->
    <div class="section-title text-center" style="margin-top: 10px;">
        <p><strong>Percaya Gak?</strong></p>

    <!-- <div class="section-content"> -->
        <div class="container text-center" style="margin-top: 10px;">
            <h5>
                Apapun yang kita lakukan, mulai dari bangun pagi, sarapan, mandi, sekolah, bekerja, belanja, olahraga, hingga aktivitas lainnya sampai tidur lagi, semuanya berhubungan dengan data. 
                Baik itu data dari BPS maupun non-BPS.
            </h5>
            
            <h5>
                Tidak ada satu hari pun yang kita lalui tanpa berhubungan dengan data. Oleh karena itu, salah satu konten yang dihasilkan dalam kelas Storyteller ini adalah 
                <strong>"A Day With Data."</strong> Konten ini mengaitkan kehidupan sehari-hari dengan data yang dihasilkan oleh BPS. Kami berharap, melalui konten ini, pengguna data dapat memperoleh 
                insight dari data yang BPS kumpulkan.
            </h5>
        </div>
    </div>
</main>
</section>
<?php
// Fungsi untuk mengekstrak ID video dari link YouTube
function extract_video_id($url) {
    $url = parse_url($url, PHP_URL_PATH);
    $parts = explode('/', $url);
    return end($parts);  // Mengambil ID video dari URL
}
?>
