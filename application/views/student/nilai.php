<!DOCTYPE html>
<html lang="en">

<?php
$this->basic->header("Lihat Nilai");
$this->basic->headerBootstrap();
?>

<!-- TODO: added functionality here -->

<body class="default-backgound-color">
    <div class="position-relative py-2 h-100 pt-5 px-4 align-content-center">

        <!-- start subtema page -->
        <div class="position-absolute top-0 start-50 translate-middle-x mt-5">
            <!-- <h1 class="text-uppercase font-weight-bold mb-2 fs-30 text-left text-white">Soal! </h1>
            <div class="font-weight-bold mb-4 fs-20 text-black">Kerjakan dengan cepat dan cermat!</div> -->
            <!-- start card -->
            <div class="card p-4 shadow  fs-24 rounded-5 " style="width: 50rem; height: max-content">
                <!-- start card body -->
                <div class="card-body">
                    <h1 class="text-black font-weight-bold fs-20">Nama Siswa </h1>
                    <h1 class="text-black font-weight-bold mb-4 fs-20 ">No. Absen </h1>

                    <!-- start list subtema and score -->
                    <div class="">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" style="border: none;">Subtema</th>
                                    <th scope="col" style="border: none;" class="text-right pe-5">Nilai</th>
                                </tr>
                            </thead>
                            <tbody class="shadow rounded-5 " style="border: white; padding: 100px;">
                                <?php
                                foreach ($scores as $value) {
                                ?>
                                    <tr>
                                        <td><?= $value["name"] ?></td>
                                        <td class="text-right pe-5">
                                            <?php
                                            if ($value["score"] <= 0) {
                                                echo "-";
                                            } else {
                                                echo $value["score"];
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- end list subtema and score -->

                    <!-- btn back -->
                    <div class="mt-5 pt-5">
                        <div class="btn w-25 shadow bg-white fs-50 text-black">Kembali</div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end subtema page -->
    </div>

    <!-- footer scripts -->
    <?php
    $this->basic->footerScripts();
    $this->basic->scriptsBootstrap();
    ?>
</body>

</html>