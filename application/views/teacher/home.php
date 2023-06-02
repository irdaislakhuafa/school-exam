<!DOCTYPE html>
<html lang="en">

<?php
$this->basic->header("Login Guru");
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
                        <div class="card col-2 rounded-5 shadow float-start">
                            <div class="justify-content-center align-items-center mt-2">
                                <img src="<?= base_url() ?>assets/images/teacher-home-avatar.png" class="rounded card-img-top" style="width: 151px;" alt="" srcset="">
                                <hr>
                                <div class="text-center font-weight-bold fs-20 mt-3 mb-3">hello world</div>
                            </div>
                        </div>

                        <!-- TODO: added functionality here -->

                        <!-- start class -->
                        <div class="col-10 float-end w-75">
                            <div class="ms-0 me-5">
                                <div class="mb-3">Kelas Anda :</div>

                                <?php for ($i = 0; $i < 2; $i++) { ?>
                                    <!-- start list class -->
                                    <div class="card mb-3 shadow-lg p-4 rounded-4" style="background: #79E0EE;">
                                        <!-- tema title -->
                                        <div class="font-weight-bold">Tema <?= $i + 1 ?></div>
                                        <!-- class number -->
                                        <div class="ms-1 fs-20 font-weight-bold">Kelas <?= $i + 2 ?></div>
                                        <!-- total number of class member -->
                                        <div class="fs-15 ms-1 mt-3">20 Anggota</div>
                                        <hr class="border border-1 border-black">

                                        <!-- start buttons -->
                                        <div class="d-flex justify-content-between">
                                            <button class="btn bg-white shadow ps-5 pe-5">Edit</button>
                                            <button class="btn bg-white shadow ps-5 pe-5">Lihat Hasil</button>
                                        </div>
                                        <!-- end buttons -->
                                    </div>
                                    <!-- end list class -->
                                <?php } ?>

                                <!-- button to create a new class -->
                                <button class="btn btn-info shadow-lg text-capitalize text-black font-weight-bold float-end mt-4 ps-5 pe-5" style="background: #79E0EE;">buat kelas</button>
                            </div>
                        </div>
                        <!-- end class -->
                    </div>
                </div>
                <!-- end card body -->

                <!-- next button -->
                <div class="d-flex align-items-end justify-content-end">
                    <button type="submit" class="btn shadow bg-white w-25">Selanjutnya</button>
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