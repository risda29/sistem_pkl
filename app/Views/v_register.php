<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Register Pengguna</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="<?= base_url('logo/tanahlaut.jpg') ?>" type="image/x-icon" />
    <script src="https://www.google.com/recaptcha/api.js?hl=id" async defer></script>
    <!-- Fonts and icons -->
    <script src="<?= base_url('backend') ?>/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Open+Sans:300,400,600,700"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: ['../assets/css/fonts.css']
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url('backend') ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('backend') ?>/assets/css/azzara.min.css">
    <style>
        .form-container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group .row {
            display: flex;
            flex-wrap: wrap;
        }

        .form-group .row .col {
            flex: 1;
            padding: 5px;
        }

        .btn-block {
            width: 100%;
        }

        .text-center img {
            margin-bottom: 15px;
        }
    </style>
    </head>

    <body class="login">
        <div class="wrapper wrapper-login">
            <div class="container container-login animated fadeIn">
                <div class="text-center">
                    <a href="<?= base_url('Home') ?>" style="font-size:20px; font-weight:bold;">Registrasi E-Learning
                        Badan
                        Pusat Statistik</a>
                </div>
                <br>
                <center>
                    <img src="<?= base_url('logo/tanahlaut.jpg') ?>" width="80px">
                </center>

                <br>
                <form action="<?= base_url('Akun/register') ?>" method="post" onsubmit="return validateRecaptcha()">
                    <?= csrf_field() ?>

                    <div class="form-container">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input id="username" name="username" type="text" class="form-control" required
                                placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" class="form-control" required
                                placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" name="password" type="password" class="form-control" required
                                placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input id="nama" name="nama" type="text" class="form-control" required
                                placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
    <label for="date">Tanggal Lahir</label>
    <input id="date" name="date" type="date" class="form-control" required>
</div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input id="alamat" name="alamat" type="text" class="form-control" required
                                placeholder="Alamat">
                        </div>
                        <div class="form-group">
    <label for="kabupaten">Kabupaten</label>
    <select id="kabupaten" name="kabupaten" class="form-control" required>
        <option value="" disabled selected>Pilih Kabupaten</option>
        <option value="balangan">Balangan</option>
        <option value="banjar">Banjar</option>
        <option value="barito_kuala">Barito Kuala</option>
        <option value="hulu_sungai_selatan">Hulu Sungai Selatan</option>
        <option value="hulu_sungai_tengah">Hulu Sungai Tengah</option>
        <option value="hulu_sungai_utara">Hulu Sungai Utara</option>
        <option value="kotabaru">Kotabaru</option>
        <option value="tabalong">Tabalong</option>
        <option value="tanah_bumbu">Tanah Bumbu</option>
        <option value="tanah_laut">Tanah Laut</option>
        <option value="tapin">Tapin</option>
    </select>
</div>

                        <div class="form-group">
    <label for="provinsi">Provinsi</label>
    <select id="provinsi" name="provinsi" class="form-control" required>
        <option value="">Pilih Provinsi</option>
        <option value="kalimantan-selatan">Kalimantan Selatan</option>
    </select>
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
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="instansi">Asal Instansi/Institusi</label>
                            <input id="instansi" name="instansi" type="text" class="form-control" required
                                placeholder="Asal Instansi/Institusi">
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
    <small class="form-text text-muted">Kelas interaktif adalah sesi pembelajaran yang memungkinkan interaksi langsung antara peserta dan pengajar.</small>
</div>

                        <div class="form-group">
                            <label for="manfaat">Harapan Mengikuti Kelas Interaktif?</label>
                            <input id="manfaat" name="manfaat" type="text" class="form-control" required
                                placeholder="Harapan Mengikuti Kelas Interaktif?">
                        </div>
                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6LcWqq8qAAAAAGFFmUfd1JzgdsbwP3Oa6ZRz2L8P"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <div class="text-center">
                            <a href="<?= base_url('Login') ?>" class="btn btn-link">Anda sudah punya akun? Silahkan
                                Login</a>
                        </div>

                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success">
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </form>


                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        const ikutKelas = document.getElementById("ikutikelas");
                        const manfaatInput = document.getElementById("manfaat");

                        function toggleManfaatField() {
                            if (ikutKelas.value === "ya") {
                                manfaatInput.parentElement.style.display = "block";
                                manfaatInput.setAttribute("required", "required");
                            } else {
                                manfaatInput.parentElement.style.display = "none";
                                manfaatInput.removeAttribute("required"); // Hapus required agar tetap bisa daftar
                            }
                        }

                        // Jalankan saat halaman dimuat
                        toggleManfaatField();

                        // Tambahkan event listener untuk perubahan dropdown
                        ikutKelas.addEventListener("change", toggleManfaatField);
                    });

                    function validateRecaptcha() {
                        var response = grecaptcha.getResponse();
                        if (response.length === 0) {
                            alert('Mohon centang kotak reCAPTCHA sebelum login.');
                            return false;
                        } else {
                            return true;
                        }
                    }
                </script>

            </div>
        </div>

        <script src="<?= base_url('backend') ?>/assets/js/core/jquery.3.2.1.min.js"></script>
        <script src="<?= base_url('backend') ?>/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        <script src="<?= base_url('backend') ?>/assets/js/core/popper.min.js"></script>
        <script src="<?= base_url('backend') ?>/assets/js/core/bootstrap.min.js"></script>
        <script src="<?= base_url('backend') ?>/assets/js/ready.js"></script>
    </body>

</html>