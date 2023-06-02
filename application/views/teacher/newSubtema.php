<!DOCTYPE html>
<html lang="en">

<?php
$this->basic->header("Buat Subtema");
$this->basic->headerBootstrap();
?>

<body class="default-backgound-color">
    <div class="position-relative py-2 h-100 pt-5 px-4 align-content-center">
        <!-- show tiny islands -->
        <?php $this->island->showTinyIslands() ?>

        <!-- start login page -->
        <div class="position-absolute top-0 start-50 translate-middle-x mt-5">
            <!-- start card -->
            <div class="card p-4 shadow  fs-24 rounded-4 " style="width: 80rem; height: max-content; min-height: 50rem;">
                <!-- start card body -->
                <div class="card-body">

                    <div class="">
                        <!-- teacher avatar here -->
                        <?php $this->teacher->avatarProfileImg() ?>

                        <!-- TODO: added functionality here -->

                        <!-- start class -->
                        <div class="col-10 float-start w-100">
                            <div class="ms-5 me-5">
                                <div class="mb-3 font-weight-bold">Subtema <?= $subtemaNumber ?></div>

                                <!-- start input subtema -->
                                <div class="">
                                    <!-- materi -->
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Materi</label>
                                        <textarea class="form-control shadow rounded-2" rows="13" style="background-color: #F5F5F5 !important;" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <!-- soal -->
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Soal</label>
                                        <textarea class="form-control shadow rounded-2" rows="8" style="background-color: #F5F5F5 !important;" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <!-- end input subtema -->

                            </div>
                        </div>
                        <!-- end class -->
                    </div>
                </div>
                <!-- end card body -->

                <!-- next button -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn shadow bg-white ps-5 pe-5">Kembali</button>
                    <button type="submit" class="btn shadow bg-white ps-5 pe-5">Selanjutnya</button>
                </div>
            </div>
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