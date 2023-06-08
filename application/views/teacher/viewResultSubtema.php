<!DOCTYPE html>
<html lang="en">

<?php
$this->basic->header("Hasil");
$this->basic->headerBootstrap();
?>

<body class="default-backgound-color">
    <div class="position-relative py-2 h-100 pt-5 px-4 align-content-center">
        <!-- show tiny islands -->
        <?php $this->island->showTinyIslands() ?>


        <!-- start login page -->
        <div class="position-absolute top-0 start-50 translate-middle-x mt-5">
            <!-- start card -->
            <div class="card p-4 shadow  fs-16 rounded-4 " style="width: 40rem; height: max-content; min-height: 30rem;">
                <!-- start card body -->
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Subtema</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listSubtema as $index => $subtema) { ?>
                                <tr>
                                    <th scope="row"><?= $index + 1 ?></th>
                                    <td>Subtema <?= $subtema->name ?></td>
                                    <td>
                                        <!-- TODO: change this -->
                                        <a href="<?= base_url() ?>teacher/class/result/materi/view/<?= $classId ?>/<?= $subtema->id ?>" class="btn btn-primary">Lihat</a>
                                    </td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
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