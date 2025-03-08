<main id="main"> 
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in" style="background-color: #6495ED; color: #fff;">
        <div class="container">
            <br>
            <h2>Karya Kami</h2>
        </div>
    </div>

    <section id="karya" class="why-us">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        

      <div class="section-content">
  <div class="container text-center">
    <h2 class="section-title">Karya Kami</h2>
    <div class="row justify-content-center">
                       <!-- Loop foreach untuk setiap karya -->
<?php foreach ($karya as $item): ?>
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
                        <div class="video-wrapper">
                            <iframe width="100%" height="100%" 
                                    src="https://www.youtube.com/embed/<?= $video_id ?>" 
                                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                            </iframe>
                        </div>
                    <?php else: ?>
                        <p>Video tidak dapat diputar.</p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <!-- Judul karya -->
            <h4 style="margin-top: 15px;">
                <a href="<?= site_url('karya/' . $item['id_karya']) ?>" 
                   style="color: black; text-decoration: none; font-weight: bold;">
                   <?= $item['judul'] ?>
                </a>
            </h4>
        </div>
    </div>
<?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
// Fungsi untuk mengekstrak ID video dari link YouTube
// Fungsi untuk mengekstrak ID video dari link YouTube yang lebih robust
function extract_video_id($url) {
    $url = parse_url($url, PHP_URL_PATH);
    $parts = explode('/', $url);
    return end($parts);  // Mengambil ID video dari URL
}

?>
