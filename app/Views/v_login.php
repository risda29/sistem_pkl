<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login</title>
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

            <form action="<?= base_url('Login') ?>" method="POST">
                <?php if (session()->getFlashdata('error')) { ?>
                    <div class="alert alert-danger">
                        <?php echo session()->getFlashdata('error') ?>
                    </div>
                <?php } ?>

                <div class="form-group">
                    <input id="username" name="username" type="text" class="form-control" required
                        placeholder="Username">
                    <p class="text-danger"></p>
                    <div class="position-relative">
                        <input id="password" name="password" type="password" class="form-control" required
                            placeholder="Password">
                        <div class="show-password">
                            <i class="flaticon-interface"></i>
                        </div>
                    </div>
                </div>

                <!-- ReCAPTCHA -->
                <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6LcWqq8qAAAAAGFFmUfd1JzgdsbwP3Oa6ZRz2L8P"></div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <div class="text-center">
                        <a href="<?= site_url('Akun/index?page=lupa_password') ?>">Lupa Password</a>

                        </div>
                    </form>

            <script>
                function validateRecaptcha() {
                    var response = grecaptcha.getResponse();
                    if (response.length === 0) {
                        // ReCAPTCHA tidak terverifikasi
                        alert('Mohon centang kotak reCAPTCHA sebelum login.');
                        return false; // Hentikan proses login
                    } else {
                        // ReCAPTCHA terverifikasi, lanjutkan dengan proses login
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