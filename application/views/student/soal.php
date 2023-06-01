<!DOCTYPE html>
<html lang="en">

<?php
$this->basic->header("Soal!");
$this->basic->headerBootstrap();
?>

<!-- TODO: added functionality here -->

<body class="default-backgound-color">
    <div class="position-relative py-2 h-100 pt-5 px-4 align-content-center">

        <!-- tidy island 1 -->
        <!-- <div>
            <img src="<?= base_url() ?>assets/images/tiny-island-1.png" class="tiny-island ms-3" alt="island 1">
        </div> -->

        <!-- tidy island 2 -->
        <!-- <div class="position-absolute offset-10 pt-5 mt-5">
            <img src="<?= base_url() ?>assets/images/tiny-island-2.png" class="tiny-island" alt="island 1">
        </div> -->

        <!-- tidy island 3 -->
        <!-- <div class="position-absolute top-50 offset-1 pt-5 mt-5">
            <img src="<?= base_url() ?>assets/images/tiny-island-3.png" class="tiny-island" alt="island 1">
        </div> -->

        <!-- start subtema page -->
        <div class="position-absolute top-0 start-50 translate-middle-x mt-5">
            <h1 class="text-uppercase font-weight-bold mb-2 fs-30 text-left text-white">Soal! </h1>
            <div class="font-weight-bold mb-4 fs-20 text-black">Kerjakan dengan cepat dan cermat!</div>
            <!-- start card -->
            <div class="card p-4 shadow  fs-24 rounded-5 " style="width: 80rem; height: min-content">
                <!-- start card body -->
                <div class="card-body">
                    <p class="text-black fs-20">Tuliskan pokok pikiran dari setiap paragraf. </p>

                    <!-- start input answer -->
                    <div class="">
                        <!-- pokok paragraf 1 -->
                        <span class="fs-20 mb-5 pb-5">Pokok pikiran paragraf 1 :</span>
                        <div class="input-group">
                            <textarea class="form-control fs-20" aria-label="With textarea" rows="10"></textarea>
                        </div>

                        <!-- pokok paragraf 2 -->
                        <span class="fs-20 mb-5 pb-5">Pokok pikiran paragraf 1 :</span>
                        <div class="input-group">
                            <textarea class="form-control fs-20" aria-label="With textarea" rows="10"></textarea>
                        </div>
                    </div>
                    <!-- end input answer -->
                </div>

                <!-- <div class="position-absolute top-100 end-0" style="margin-top: 68px; margin-right: 100px;">
                    <div class="triangle rounded-4"></div>
                </div> -->
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->

        <div class="">
            <!-- btn back -->
            <div class="mb-5 position-absolute bottom-0 ms-5 ps-4 z-1">
                <div class="btn shadow bg-white fs-50 text-black">Kembali</div>
            </div>
            <!-- btn next -->
            <div class="mb-5 position-absolute bottom-0 end-0 me-5 pe-4 z-1">
                <div class="btn shadow bg-white fs-50 text-black">Selanjutnya</div>
            </div>
        </div>
    </div>
    </div>
    <!-- end subtema page -->

    <!-- footer scripts -->
    <?php
    $this->basic->footerScripts();
    $this->basic->scriptsBootstrap();
    ?>
</body>

</html>