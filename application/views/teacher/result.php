<!DOCTYPE html>
<html lang="en">

<?php
$this->basic->header("Pilih Subtema");
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
                        <?php $this->teacher->avatarProfileImg($this->session->name) ?>

                        <!-- TODO: added functionality here -->

                        <!-- start class -->
                        <div class="col-10 float-start w-50">
                            <div class="ms-5 me-5">
                                <div class="mb-3 font-weight-bold">Pilih Subtema :</div>

                                <!-- start list subtema -->
                                <!-- <?php foreach ($listSubtema as $i => $subtema) { ?>
                                    <a href="<?= base_url() ?>teacher/class/subtema/materi/new/<?= $subtema->id ?>" class="mb-3 w-100 row">
                                        <button class="btn shadow" style="background-color: #F5F5F5;">
                                            <div class="text-up float-start">subtema <?= $subtema->name ?></div>
                                        </button>
                                    </a>
                                <?php } ?> -->
                                <!-- end list subtema -->

                                <!-- success message -->
                                <?php
                                $success = $this->session->flashdata('success');
                                if ($success != null && $success != "") { ?>
                                    <div id="success" class="alert fs-16 alert-success" style="margin-left: -16px;" role="alert">
                                        <?= $success ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- end class -->
                    </div>
                </div>
                <!-- end card body -->

                <!-- next button -->
                <div class="d-flex justify-content-between">
                    <button id="back" type="submit" class="btn shadow bg-white ps-5 pe-5">Kembali</button>
                    <!-- <button id="save" type="submit" class="btn shadow bg-white ps-5 pe-5">Simpan</button> -->
                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- end login page -->

    <script>
        // back
        document.getElementById("back").addEventListener("click", () => window.location.href = "<?= base_url()  ?>teacher/home");
        // save
        // TODO: save subtema here and redirect to home page
        // document.getElementById("save").addEventListener("click", () => window.location.href = "teacher/class/subtema/save");
    </script>

    <!-- footer scripts -->
    <?php
    $this->basic->footerScripts();
    $this->basic->scriptsBootstrap();
    ?>
</body>

</html>