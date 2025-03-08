<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Lupa Password</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="<?= base_url('logo/tanahlaut.jpg') ?>" type="image/x-icon" />

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
</head>

<body class="login">
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn">
            <div class="text-center">
                <a href="<?= base_url('Home') ?>" style="font-size:20px; font-weight:bold;">Website E-Learning BPS</a>
            </div>
            <br>
            <center>
                <img src="<?= base_url('logo/tanahlaut.jpg') ?>" width="80px">
            </center>
            <form action="<?= base_url('Akun/resetPassword') ?>" method="POST" id="resetForm">
                <?php if (session()->getFlashdata('error')) { ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php } ?>
                <!-- Form untuk input email -->
                <div class="form-group">
                    <br>
                    <br>
                    <input id="email" name="email" type="email" class="form-control" required placeholder="@Email">
                </div>
                <div class="form-group">
                    <button id="resetTokenBtn" type="submit" class="btn btn-primary btn-block">Kirim Reset
                        Token</button>
                </div>
                <a href="<?= base_url('Login') ?>" class="btn btn-link mt-3 mt-sm-0">Kembali ke Login</a>
            </form>
        </div>
    </div>
    <script>
    // Mengambil formulir dan tombol Kirim Reset Token
    const resetForm = document.getElementById('resetForm');
    const resetTokenBtn = document.getElementById('resetTokenBtn');

    // Menambahkan event listener untuk mengatur atribut disabled setelah diklik
    resetForm.addEventListener('submit', function () {
        resetTokenBtn.disabled = true; // Menonaktifkan tombol setelah diklik
    });
</script>
    <script src="<?= base_url('backend') ?>/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="<?= base_url('backend') ?>/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="<?= base_url('backend') ?>/assets/js/core/popper.min.js"></script>
    <script src="<?= base_url('backend') ?>/assets/js/core/bootstrap.min.js"></script>
</body>

</html>