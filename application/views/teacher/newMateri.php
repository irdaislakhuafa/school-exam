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

        <!-- TODO: soalnya ada 5 -->
        <!-- TODO: save soal -->
        <form action="<?= base_url() ?>teacher/class/subtema/materi/new/<?= $subtema->id ?>/<?= $questionNumber + 1 ?>" method="post" enctype="multipart/form-data">
            <!-- start subtema/soal page -->
            <div class="position-absolute top-0 start-50 translate-middle-x mt-5">
                <!-- start card -->
                <div class="card p-4 shadow mb-5 fs-24 rounded-4 " style="width: 80rem; height: max-content; min-height: 50rem;">
                    <!-- start card body -->
                    <div class="card-body">

                        <div class="">
                            <!-- teacher avatar here -->
                            <?php $this->teacher->avatarProfileImg() ?>

                            <!-- TODO: added functionality here -->

                            <!-- start class -->
                            <div class="col-10 float-start w-100">
                                <div class="ms-5 me-5">
                                    <div class="mb-3 font-weight-bold">Subtema <?= $subtema->name ?></div>

                                    <!-- start input subtema -->
                                    <div class="">
                                        <!-- subtema id -->
                                        <input required name="subtemaId" value="<?= $subtema->id ?>" hidden type="text">
                                        <div class="mb-3">
                                            <input type="number" name="number" id="number" hidden value="<?= $questionNumber ?>">
                                            <!-- materi -->
                                            <label for="content" class="form-label">Materi : <?= $questionNumber  ?> </label>
                                            <div class="input-group mb-3  shadow rounded-2">
                                                <span class="input-group-text" id="title">Judul</span>
                                                <input required name="title" type="text" class="form-control" placeholder="Tulis Judul Materi" aria-label="title" aria-describedby="title">
                                            </div>
                                            <textarea required name="content" class="form-control shadow rounded-2" rows="13" style="background-color: #F5F5F5 !important;" id="content"></textarea>

                                            <!-- upload list image -->
                                            <div class="row">
                                                <?php for ($i = 1; $i <= 3; $i++) { ?>
                                                    <div class="col-4 w-100 me-5 fs-16">
                                                        <input type="file" class=" mb-2 mt-2 shadow" name="image<?= $i ?>" id="">
                                                        <textarea name="image<?= $i ?>Description" id="" cols="20" rows="2" class="form-control shadow rounded-2"></textarea>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <!-- soal -->
                                        <div class="mb-3">
                                            <div class="row">
                                                <label for="" class="form-label">Soal Pertanyaan : <?= $questionNumber  ?></label>
                                                <div class="col-6">
                                                    <span>Soal 1</span>
                                                    <textarea id="question1" name="question1" required class="form-control shadow rounded-2" rows="8" style="background-color: #F5F5F5 !important;" rows="3" cols="10"></textarea>
                                                </div>
                                                <div class="col-6">
                                                    <span>Soal 2</span>
                                                    <textarea id="question2" name="question2" required class="form-control shadow rounded-2" rows="8" style="background-color: #F5F5F5 !important;" rows="3" cols="10"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end input subtema -->

                                </div>
                            </div>
                            <!-- end class -->
                        </div>
                    </div>
                    <!-- end card body -->

                    <!-- TODO: handle save new soal here -->

                    <!-- next button -->
                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url() . "teacher/class/subtema/select" ?>" id="back" class="btn shadow bg-white ps-5 pe-5">Kembali</a>
                        <?php
                        if ($questionNumber < 5) { ?>
                            <button id="save" type="submit" class="btn shadow bg-white ps-5 pe-5">Selanjutnya</button>
                        <?php
                        } else { ?>
                            <button id="save" type="submit" class="btn shadow bg-white ps-5 pe-5">Simpan</button>
                            <!-- <a id="save" href="<?= base_url() ?>teacher/class/subtema/select" class="btn shadow bg-white ps-5 pe-5"> Simpan</a> -->
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- end card -->
            </div>
        </form>

    </div>
    <!-- end subtema/soal page -->

    <script>
        // back
        // document.getElementById("back").addEventListener("click", () => window.location.href = "<?= base_url() ?>teacher/class/subtema/select")
        // TODO: save and redirect to teacher/class/subtema/select
        // document.getElementById("save").addEventListener("click", () => window.location.href = "<?= base_url() ?>teacher/class/subtema/select")
    </script>

    <!-- footer scripts -->
    <?php
    $this->basic->footerScripts();
    $this->basic->scriptsBootstrap();
    ?>
</body>

</html>