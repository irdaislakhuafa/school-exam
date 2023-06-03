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

        <!-- start form create class -->
        <form action="<?= base_url() ?>teacher/class/create" method="post">
            <!-- start class -->
            <div id="class" class="position-absolute top-0 start-50 translate-middle-x mt-5">
                <!-- start card -->
                <div class="card p-4 shadow  fs-24 rounded-4 " style="width: 80rem; height: max-content; min-height: 50rem;">
                    <!-- start card body -->
                    <div class="card-body">
                        <div class="">
                            <!-- teacher avatar here -->
                            <?php $this->teacher->avatarProfileImg($this->session->name) ?>

                            <!-- start class -->
                            <div class="col-10 float-start w-50">
                                <div class="ms-5 me-5">
                                    <div class="mb-3 font-weight-bold">Buat Kelas :</div>
                                    <div class="fs-18">

                                        <!-- class name -->
                                        <div class="mb-3">
                                            <label for="name" class="font-weight-bold form-label">Nama Kelas</label>
                                            <input id="name" name="name" type="text" class="form-control shadow rounded-3b" style="background-color: #F5F5F5;" id="" placeholder="Nama Kelas">
                                        </div>

                                        <!-- class tema -->
                                        <div class="mb-3">
                                            <label for="tema" class="font-weight-bold form-label">Tema</label>
                                            <input id="tema" name="tema" type="text" class="form-control shadow rounded-3b" style="background-color: #F5F5F5;" id="" placeholder="Tema">
                                        </div>

                                        <!-- class code -->
                                        <div class="mb-3">
                                            <label for="code" class="font-weight-bold form-label">Kode Kelas</label>
                                            <input id="code" name="code" type="text" class="form-control shadow rounded-3b" style="background-color: #F5F5F5;" id="" placeholder="Masukan Kode">
                                        </div>

                                        <!-- error message -->
                                        <?php
                                        $error = $this->session->flashdata('error');
                                        if ($error != null || $error != "") { ?>
                                            <div class="mb-3" id="error">
                                                <div class="alert alert-danger fs-16" role="alert">
                                                    <?= $error ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- end class -->
                        </div>
                    </div>
                    <!-- end card body -->

                    <!-- next button -->
                    <div class="d-flex justify-content-between">
                        <button id="back" type="button" class="btn shadow bg-white ps-5 pe-5">Kembali</button>
                        <button type="submit" class="btn shadow bg-white ps-5 pe-5">Selanjutnya</button>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end class -->
        </form>
        <!-- end form create class -->
    </div>

    <script>
        let classPage = document.getElementById("class")

        document.getElementById("back").addEventListener("click", function() {
            window.location.href = "<?= base_url() ?>teacher/home";
        })
    </script>

    <!-- footer scripts -->
    <?php
    $this->basic->footerScripts();
    $this->basic->scriptsBootstrap();
    ?>
</body>

</html>