<!DOCTYPE html>
<html lang="en">

<?php
$this->basic->header("Sub Tema");
$this->basic->headerBootstrap();
?>

<!-- TODO: added functionality here -->

<body class="default-backgound-color">
    <div class="position-relative py-2 h-100 pt-5 px-4 align-content-center">


        <!-- start subtema page -->
        <div class="position-absolute top-0 start-50 translate-middle-x mt-5">
            <h1 class="text-uppercase font-weight-bold mb-2 fs-30 text-left text-white">SUBTEMA <?= $subtema->name ?> </h1>
            <!-- start card -->
            <div class="card p-4 shadow  fs-24 rounded-5 " style="width: 70rem; height: min-content">
                <div class="font-weight-bold text-up"><?= "Materi " . $materi->number . ": " . $materi->title ?></div>
                <!-- start card body -->
                <div class="card-body">
                    <p class="text-black fs-20"><?= $materi->content ?></p>
                </div>

                <!-- <div class="row d-flex justify-content-between">
                    <div class="col-4 card-image">
                        <img src="<?= base_url() ?>assets/images/tiny-island-3.png" class="w-50 h-auto" alt="island 1"><br>
                        <span class="fs-20 font-weight-bold">Lorem ipsum, dolor sit amet consectetur adipisicing elit. </span>
                    </div>
                    <div class="col-4 card-image">
                        <img src="<?= base_url() ?>assets/images/tiny-island-3.png" class="w-50 h-auto" alt="island 1"><br>
                        <span class="fs-20 font-weight-bold">Lorem ipsum, dolor sit amet consectetur adipisicing elit. </span>
                    </div>
                    <div class="col-4 card-image">
                        <img src="<?= base_url() ?>assets/images/tiny-island-3.png" class="w-50 h-auto" alt="island 1"><br>
                        <span class="fs-20 font-weight-bold">Lorem ipsum, dolor sit amet consectetur adipisicing elit. </span>
                    </div>
                </div> -->

                <!-- start image -->
                <div class="row d-flex justify-content-between">
                    <?php foreach ($images as $index => $image) { ?>
                        <div class="col-4 card-image">
                            <img src="<?= base_url() ?>uploads/<?= $image->name ?>" class="w-50 h-auto" alt="island 1"><br>
                            <span class="fs-20 font-weight-bold"><?= $image->description ?></span>
                        </div>
                    <?php } ?>
                </div>
                <!-- end image -->

                <div class="position-absolute top-100 end-0" style="margin-top: 68px; margin-right: 100px;">
                    <div class="triangle rounded-4"></div>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->

        <div class="">
            <!-- btn back -->
            <div class="mb-5 position-absolute bottom-0 ms-5 ps-4 z-1">
                <div id="back" class="btn shadow bg-white fs-20 text-black">Kembali</div>
            </div>
            <!-- btn next -->
            <div class="mb-5 position-absolute bottom-0 end-0 me-5 pe-4 z-1">
                <div id="next" class="btn shadow bg-white fs-20 text-black">Selanjutnya</div>
            </div>
            <!-- teacher avatar -->
            <div class="position-absolute bottom-0 end-0">
                <img src="<?= base_url() ?>assets/images/teacher-avatar.png" style="width: 314px; z-index: 10;" alt="" srcset="">
            </div>
        </div>
    </div>
    </div>
    <!-- end subtema page -->

    <script>
        let btnBack = document.getElementById("back")
        let btnNext = document.getElementById("next")

        btnBack.addEventListener('click', function() {
            history.back();
        })

        btnNext.addEventListener('click', function() {
            window.location.href = '<?= base_url() ?>student/soal/<?= $materi->id . "/" . ($materi->number) ?>'
        })
    </script>

    <!-- footer scripts -->
    <?php
    $this->basic->footerScripts();
    $this->basic->scriptsBootstrap();
    ?>
</body>

</html>