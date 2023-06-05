<!DOCTYPE html>
<html lang="en">

<?php
$this->basic->header("Soal!");
$this->basic->headerBootstrap();
?>

<!-- TODO: added functionality here -->

<body class="default-backgound-color">
    <div class="position-relative py-2 h-100 pt-5 px-4 align-content-center">

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
                    <form action="" method="post">
                        <div class="">
                            <?php foreach ($listSoal as $index => $soal) { ?>
                                <!-- pokok paragraf 1 -->
                                <span class="fs-20 mb-5 pb-5"><?= $soal->question ?></span>
                                <div class="input-group">
                                    <textarea name="soal<?= $index + 1 ?>" class="form-control fs-20" aria-label="With textarea" rows="10"></textarea>
                                </div>
                            <?php } ?>

                            <!-- pokok paragraf 2 -->
                            <!-- <span class="fs-20 mb-5 pb-5">Pokok pikiran paragraf 1 :</span>
                            <div class="input-group">
                                <textarea class="form-control fs-20" aria-label="With textarea" rows="10"></textarea>
                            </div> -->
                        </div>
                        <!-- end input answer -->
                    </form>
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
                <div id="back" class="btn shadow bg-white fs-50 text-black">Kembali</div>
            </div>
            <!-- btn next -->
            <div class="mb-5 position-absolute bottom-0 end-0 me-5 pe-4 z-1">
                <div id="next" class="btn shadow bg-white fs-50 text-black">Selanjutnya</div>
            </div>
        </div>
    </div>
    </div>
    <!-- end subtema page -->

    <script>
        let btnBack = document.getElementById("back")
        let btnNext = document.getElementById("next")

        btnBack.addEventListener('click', function() {
            // TODO: redirect to subtema           
            history.back();

        })

        btnNext.addEventListener('click', function() {
            // TODO: handle redirect soal here and ask where Destination
            // alert("Destination of this button is unknown")
            window.location.href = '<?= base_url() ?>student/subtema/<?= $subtemaId ?>/<?= $materi->number + 1 ?>'
        })
    </script>

    <!-- footer scripts -->
    <?php
    $this->basic->footerScripts();
    $this->basic->scriptsBootstrap();
    ?>
</body>

</html>