<!DOCTYPE html>
<html lang="en">

<?php
$this->basic->header("Peta");
$this->basic->headerBootstrap();
?>

<body class="default-backgound-color">
    <!-- <div class="limiter bg-student-login">
        <div class="position-relative m-4">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="<?= base_url() ?>./assets/images/img-01.png" alt="IMG">
                </div>

                <form class="login100-form validate-form">
                    <span class="login100-form-title">
                        Member Login
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="pass" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="assets/#">
                            Username / Password?
                        </a>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="assets/#">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div> -->

    <div class="position-relative py-2 h-100 pt-5 px-4 align-content-center">

        <!-- tidy island 1 -->
        <div>
            <img src="<?= base_url() ?>assets/images/tiny-island-1.png" class="tiny-island ms-3" alt="island 1">
        </div>

        <!-- tidy island 2 -->
        <div class="position-absolute offset-10 pt-5 mt-5">
            <img src="<?= base_url() ?>assets/images/tiny-island-2.png" class="tiny-island" alt="island 1">
        </div>

        <!-- tidy island 3 -->
        <div class="position-absolute top-50 offset-1 pt-5 mt-5">
            <img src="<?= base_url() ?>assets/images/tiny-island-3.png" class="tiny-island" alt="island 1">
        </div>

        <!-- start login page -->
        <div class="position-absolute top-50 w-50 offset-4 translate-middle-y">
            <!-- start card -->
            <img src="<?= base_url() ?>assets/images/maps.png" alt="" class="col-8">
            <!-- end card -->
        </div>
    </div>
    <!-- end login page -->

    <!-- footer scripts -->
    <?php
    $this->basic->footerScripts();
    $this->basic->scriptsBootstrap();
    ?>
</body>

</html>