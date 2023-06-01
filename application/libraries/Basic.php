<?php
class Basic
{
    public function header(string $title = "login")
    { ?>

        <head>
            <title><?= $title ?></title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!--===============================================================================================-->
            <link rel="icon" type="image/png" href="assets/images/icons/favicon.ico" />
            <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
            <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
            <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
            <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
            <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
            <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="assets/css/util.css">
            <link rel="stylesheet" type="text/css" href="assets/css/main.css">
            <!--===============================================================================================-->
        </head>
    <?php
    }

    public function footerScripts()
    { ?>
        <!--===============================================================================================-->
        <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="assets/vendor/bootstrap/js/popper.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="assets/vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="assets/vendor/tilt/tilt.jquery.min.js"></script>
        <script>
            $('.js-tilt').tilt({
                scale: 1.1
            })
        </script>
        <!--===============================================================================================-->
        <script src="assets/js/main.js"></script>
    <?php
    }

    public function headerBootstrap()
    { ?>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <?php }

    public function scriptsBootstrap()
    { ?>
        <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<?php
    }
}
