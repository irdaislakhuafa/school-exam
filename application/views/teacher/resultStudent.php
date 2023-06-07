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
            <!-- materi content -->
            <div>
                <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMateri" aria-expanded="false" aria-controls="collapseMateri">
                    Tampilkan
                </button>
                <div class="collapse mt-2 mb-3" id="collapseMateri">
                    <div class="card card-body shadow">
                        <?= $materi->content ?>
                    </div>
                </div>
            </div>


            <!-- start form -->
            <form action="<?= base_url() ?>teacher/class/subtema/saveScores" method="post">
                <!-- start card -->
                <div class="card p-4 shadow  fs-16 rounded-4 " style="width: 80rem; height: max-content; min-height: 50rem;">
                    <!-- start card body -->
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">No Absen</th>
                                    <th scope="col">Jawaban</th>
                                    <th scope="col">Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- length of all student -->
                                <input name="studentLength" type="number" hidden value="<?= count($listStudent) ?>">
                                <!-- materi id -->
                                <input name="materiId" type="text" hidden value="<?= $materi->id ?>">
                                <?php foreach ($listStudent as $index => $student) { ?>
                                    <tr>
                                        <th scope="row"><?= $index + 1 ?></th>
                                        <td><?= $student->name ?></td>
                                        <td><?= $student->noAbsen ?></td>
                                        <td>
                                            <div>
                                                <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAnswer" aria-expanded="false" aria-controls="collapseAnswer">
                                                    Lihat
                                                </button>
                                                <div class="collapse mt-2 mb-3" id="collapseAnswer">
                                                    <div class="card card-body shadow">
                                                        <?php
                                                        foreach ($student->listSoal as $soal) { ?>
                                                            <div>Pertanyaan: <?= $soal["question"] ?></div>
                                                            <hr>
                                                            <p><?= $soal["answer"] ?></p>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <!-- id -->
                                            <input name="studentId<?= $index ?>" type="text" hidden required value="<?= $student->id ?>"></input>
                                            <!-- scores -->
                                            <input name="studentScore<?= $index ?>" type="number" max="100" min="0" required class="form-control w-50"></input>
                                        </td>
                                    </tr>
                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- end card body -->

                    <!-- next button -->
                    <div class="d-flex justify-content-between">
                        <button id="back" type="button" class="btn shadow bg-white ps-5 pe-5">Kembali</button>
                        <button id="save" type="submit" class="btn shadow bg-white ps-5 pe-5">Simpan</button>
                    </div>
                </div>
                <!-- end card -->
            </form>
            <!-- end form -->
        </div>
    </div>
    <!-- end login page -->

    <script>
        // back
        document.getElementById("back").addEventListener("click", () => history.back());
    </script>

    <!-- footer scripts -->
    <?php
    $this->basic->footerScripts();
    $this->basic->scriptsBootstrap();
    ?>
</body>

</html>