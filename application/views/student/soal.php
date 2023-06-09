<!DOCTYPE html>
<html lang="en">

<?php
$this->basic->header("Soal!");
$this->basic->headerBootstrap();
?>

<!-- TODO: added functionality here -->

<body class="default-backgound-color">
    <!-- start subtema page -->
    <div class="position-relative py-2 h-100 pt-5 px-4 align-content-center">
        <!-- start form -->
        <form action="<?= base_url() ?>student/saveAnswer/<?= $materi->subtemaId ?>/<?= ($materi->number + 1) ?>" method="post">

            <!-- materi id -->
            <input name="materiId" hidden value="<?= $materi->id ?>" type="text" required>

            <div class="position-absolute top-0 start-50 translate-middle-x mt-5">
                <h1 class="text-uppercase font-weight-bold mb-2 fs-30 text-left text-white">Soal! </h1>
                <div class="font-weight-bold mb-4 fs-20 text-black">Kerjakan dengan cermat dan tepat!</div>
                <!-- start card -->
                <div class="card p-4 mb-5 shadow  fs-24 rounded-5 " style="width: 50rem; height: min-content">
                    <!-- start card body -->
                    <div class="card-body">
                        <p class="text-black fs-20">Tuliskan pokok pikiran dari setiap paragraf. </p>

                        <!-- start input answer -->
                        <div class="">
                            <?php foreach ($listSoal as $index => $soal) { ?>
                                <span class="fs-20 mb-5 pb-5"><?= $soal->question ?></span>
                                <!-- soal id -->
                                <input type="text" hidden name="soalId<?= $index + 1 ?>" value="<?= $soal->id ?>">
                                <div class="input-group">
                                    <textarea required name="answer<?= $index + 1 ?>" class="form-control fs-20" aria-label="With textarea" rows="3"></textarea>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- end input answer -->
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="">
                <!-- btn back -->
                <div class=" mb-5 position-absolute bottom-0 ms-5 ps-4 z-1">
                    <div id="back" class="btn shadow bg-white fs-50 text-black">Kembali</div>
                </div>
                <!-- btn next -->
                <div class=" mb-5 position-absolute bottom-0 end-0 me-5 pe-4 z-1">
                    <button id="next" type="submit" class="btn shadow bg-white fs-50 text-black">Selanjutnya</button>
                </div>
            </div>
            <!-- end form -->
        </form>
    </div>
    <!-- end subtema page -->


    <script>
        let btnBack = document.getElementById("back")
        let btnNext = document.getElementById("next")

        btnBack.addEventListener('click', function() {
            // TODO: redirect to subtema           
            history.back();

        })
    </script>

    <!-- footer scripts -->
    <?php
    $this->basic->footerScripts();
    $this->basic->scriptsBootstrap();
    ?>
</body>

</html>