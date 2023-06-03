<?php
class Basic
{
    public function header(string $title = "login")
    { ?>

        <head>
            <title>School Exam | <?= $title ?></title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!--===============================================================================================-->
            <link rel="icon" type="image/png" href="<?= base_url() ?>assets/images/icons/favicon.ico" />
            <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
            <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
            <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/animate/animate.css">
            <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/css-hamburgers/hamburgers.min.css">
            <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/select2/select2.min.css">
            <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/util.css">
            <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/main.css">
            <!--===============================================================================================-->

            <!-- my custom css  -->
            <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/custom-styles/style.css">

            <!-- use popins fonts -->
            <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/poppins/Poppins-Regular.ttf">
        </head>
    <?php
    }

    public function footerScripts()
    { ?>
        <!--===============================================================================================-->
        <script src="<?= base_url() ?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="<?= base_url() ?>assets/vendor/bootstrap/js/popper.js"></script>
        <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="<?= base_url() ?>assets/vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="<?= base_url() ?>assets/vendor/tilt/tilt.jquery.min.js"></script>
        <script>
            $('.js-tilt').tilt({
                scale: 1.1
            })
        </script>
        <!--===============================================================================================-->
        <script src="<?= base_url() ?>assets/js/main.js"></script>
        <script src="<?= base_url() ?>assets/js/idk.js"></script>
    <?php
    }

    public function headerBootstrap()
    { ?>
        <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css">
    <?php }

    public function scriptsBootstrap()
    { ?>
        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<?php
    }
}
