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
        <div class="position-absolute top-50 offset-4 translate-middle-y" style="width: 700px; ">
            <!-- start card -->
            <img src="<?= base_url() ?>assets/images/maps.png" alt="" class="col-8">
            <!-- end card -->


            <!-- place 1 -->
            <div class="position-absolute top-50 pt-2 mt-5 current-place" id="place-1" style="margin-left: 200px;">
                <?php $this->place->currentPlace(1) ?>
            </div>

            <!-- place 2 -->
            <div class="position-absolute top-50 place" id="place-2" style="margin-left: 300px; margin-top: 10px;">
                <?php $this->place->emptyPlace(2) ?>
            </div>

            <!-- place 3 -->
            <div class="position-absolute top-0 offset-2 place" id="place-2" style="margin-top: 200px; margin-left: 245px;">
                <?php $this->place->emptyPlace(3) ?>
            </div>

            <!-- place 4 -->
            <div class="position-absolute top-0 offset-2 place" id="place-2" style="margin-top: 100px; margin-left: 221px;">
                <?php $this->place->emptyPlace(4) ?>
            </div>

            <!-- place 5 -->
            <div class="position-absolute top-0 offset-2 place" id="place-2" style="margin-top: 64px; margin-left: 381px;">
                <?php $this->place->emptyPlace(5) ?>
            </div>

            <!-- place 6 -->
            <div class="position-absolute top-0 offset-2 place" id="place-2" style="margin-top: 37px; margin-left: 248px;">
                <?php $this->place->emptyPlace(6) ?>
            </div>

        </div>
        <!-- end login page -->

        <!-- student information -->
        <div class="position-absolute bottom-0 end-0 mb-4">
            <div class="text-right pe-5 text-black">
                <div class="mb-2">Student Name</div>
                <div class="mb-2">No Absen</div>
                <button type="button" class="btn btn-primary border border-white bg-white text-black">Lihat Nilai Pengerjaan</button>
            </div>
        </div>

    </div>


    <!-- maps scripts -->
    <!-- <script src="<?= base_url() ?>assets/js/maps.js"></script> -->

    <script>
        // TODO: added functionality here
        let places = document.getElementsByClassName('place');

        for (let i = 0; i < places.length; i++) {
            places[i].addEventListener("click", function() {
                alert(places[i].textContent)
                let current = document.getElementById("current-place")
                current.setAttribute("class", current.className.replace("current-place", "place"))
                places[i].setAttribute("class", places[i].className.replace("place", "current-place"))
            });
        }
    </script>

    <!-- footer scripts -->
    <?php
    $this->basic->footerScripts();
    $this->basic->scriptsBootstrap();
    ?>
</body>

</html>