<!DOCTYPE html>
<html lang="en">

<?php
$this->basic->header("Halaman Utama");
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
                        <?php $this->teacher->avatarProfileImg($this->session->get_userdata()["userName"]) ?>

                        <!-- start class -->
                        <div class="col-10 float-end w-75">
                            <div class="ms-0 me-5">
                                <div class="mb-3 font-weight-bold">Kelas Anda :</div>
                                <?php
                                $error = $this->session->flashdata('error');
                                if ($error != null || $error != "") { ?>
                                    <div id="error" class="alert fs-16 alert-danger" role="alert">
                                        <?= $error ?>
                                    </div>
                                <?php } ?>

                                <!-- success message -->
                                <?php
                                $success = $this->session->flashdata('success');
                                if ($success != null && $success != "") { ?>
                                    <div id="success" class="alert fs-16 alert-success" style="margin-left: -16px;" role="alert">
                                        <?= $success ?>
                                    </div>
                                <?php } ?>

                                <?php foreach ($listClass as $i => $class) { ?>
                                    <!-- start form -->
                                    <form action="<?= base_url() ?>teacher/class/edit" method="post">
                                        <!-- start list class -->
                                        <div class="card mb-3 shadow-lg p-4 rounded-4" style="background: #79E0EE;">
                                            <!-- class code/id -->
                                            <input type="text" name="id" value="<?= $class["id"] ?>" hidden></input>
                                            <!-- tema title -->
                                            <div class="font-weight-bold text-capitalize">
                                                <span class="badge text-bg-danger"><?= $class["tema"] ?></span>
                                            </div>
                                            <!-- class name -->
                                            <div class="ms-1 fs-20 font-weight-bold text-capitalize">Kelas
                                                <span class="badge text-bg-success"><?= $class["name"] ?></span>
                                            </div>
                                            <!-- class code -->
                                            <div class="ms-1 fs-20 font-weight-bold ">Kode
                                                <span class="badge text-bg-warning"> <?= $class["code"] ?></span>
                                            </div>
                                            <!-- total number of class member -->
                                            <div class="fs-15 ms-1 mt-3 text-capitalize"><?= $class["totalStudent"] ?> Anggota</div>
                                            <hr class="border border-1 border-black">

                                            <!-- TODO: create form to edit class -->
                                            <!-- start buttons -->
                                            <div class="d-flex justify-content-between">
                                                <!-- TODO: post to edit page -->
                                                <button type="submit" class="btn bg-white shadow ps-5 pe-5">Edit</button>
                                                <!-- TODO: ask where is "Lihat Hasil" page? -->
                                                <button id="idk" type="button" class="btn bg-white shadow ps-5 pe-5">Lihat Hasil</button>
                                            </div>
                                            <!-- end buttons -->
                                        </div>
                                        <!-- end list class -->
                                    </form>
                                    <!-- end form -->
                                <?php } ?>

                                <!-- button to create a new class -->
                                <button id="createNewClass" class="btn btn-info shadow-lg text-capitalize text-black font-weight-bold float-end mt-4 ps-5 pe-5" style="background: #79E0EE;">buat kelas</button>
                            </div>
                        </div>
                        <!-- end class -->
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- end login page -->

    <script>
        document.getElementById("createNewClass").addEventListener("click", function() {
            window.location.href = "<?= base_url() ?>teacher/class/new"
        })
    </script>

    <!-- footer scripts -->
    <?php
    $this->basic->footerScripts();
    $this->basic->scriptsBootstrap();
    ?>
</body>

</html>