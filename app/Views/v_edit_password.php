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
            <br>
            <!-- Password Reset Form -->
            <form action="<?= base_url('Akun/updatePassword') ?>" method="POST">
                <?php if (isset($error) && !empty($error)) { ?>
                    <div class="alert alert-danger">
                        <?= $error ?>
                    </div>
                <?php } ?>

                <div class="form-group">
                    <br>
                    <input id="email" name="email" type="email" class="form-control" required placeholder="@Email"
                        value="<?= $email ?>" readonly>
                </div>
                <div class="form-group">
                    <input id="resetToken" name="resetToken" type="text" class="form-control" required
                        placeholder="Reset Token" placeholder="Reset Token 6 kata">
                </div>
                <div class="form-group">
                    <br>
                    <input id="password" name="password" type="password" class="form-control" required
                        placeholder="Password Baru">
                </div>
                <div class="form-group">
                    <!-- Tambahkan field untuk konfirmasi password -->
                    <input id="confirmPassword" name="confirmPassword" type="password" class="form-control" required
                        placeholder="Konfirmasi Password Baru">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
                <div class="form-group">
                    <a href="<?= base_url('Akun/kirimUlangToken') ?>" class="btn btn-secondary btn-block">Kirim Ulang
                        Reset Token</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="<?= base_url('backend') ?>/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="<?= base_url('backend') ?>/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="<?= base_url('backend') ?>/assets/js/core/popper.min.js"></script>
    <script src="<?= base_url('backend') ?>/assets/js/core/bootstrap.min.js"></script>
</body>

</html>