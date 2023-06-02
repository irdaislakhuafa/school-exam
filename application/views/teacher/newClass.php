<!DOCTYPE html>
<html lang="en">

<?php
$this->basic->header("Buat Kelas Baru");
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
                        <div class="col-10 float-start w-50">
                            <div class="ms-5 me-5">
                                <div class="mb-3 font-weight-bold">Buat Kelas :</div>

                                <!-- start form  -->
                                <div class="fs-18">

                                    <!-- class name -->
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="font-weight-bold form-label">Nama Kelas</label>
                                        <input type="text" class="form-control shadow rounded-3b" style="background-color: #F5F5F5;" id="" placeholder="Nama Kelas">
                                    </div>

                                    <!-- class tema -->
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="font-weight-bold form-label">Tema</label>
                                        <input type="text" class="form-control shadow rounded-3b" style="background-color: #F5F5F5;" id="" placeholder="Tema">
                                    </div>

                                    <!-- class code -->
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="font-weight-bold form-label">Kode Kelas</label>
                                        <input type="text" class="form-control shadow rounded-3b" style="background-color: #F5F5F5;" id="" placeholder="Masukan Kode">
                                    </div>

                                </div>
                                <!-- end form  -->

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