<!DOCTYPE html>
<html lang="en">

<?php
$this->basic->header("Peta");
$this->basic->headerBootstrap();
?>

<body class="default-backgound-color">
    <div class="position-relative py-2 h-100 pt-5 px-4 align-content-center">

        <!-- show tiny islands -->
        <?php $this->island->showTinyIslands() ?>

        <!-- start maps page -->
        <div class="position-absolute top-50 offset-4 translate-middle-y" style="width: 700px; ">
            <!-- start card -->
            <img src="<?= base_url() ?>assets/images/maps.png" alt="" class="col-8">
            <!-- end card -->


            <!-- place 1 -->
            <div class="position-absolute top-50 pt-2 mt-5 current-place" id="place-1" style="margin-left: 200px;">
                <!-- TODO: code subtema here -->
                <div id="code" hidden><?= $listSubtema[0]->id ?></div>
                <div id="empty">
                    <?php $this->place->emptyPlace(1) ?>
                </div>
                <div id="selected" style="margin-top: -27px; margin-left: -18px;">
                    <?php $this->place->currentPlace(1) ?>
                </div>
            </div>

            <!-- place 2 -->
            <div class="position-absolute place" id="place-2" style="margin-left: 281px; margin-top: -295px;">
                <!-- TODO: code subtema here -->
                <div id="code" hidden><?= $listSubtema[1]->id ?></div>
                <div id="empty" style="margin-top: 28px; margin-left: 18px;">
                    <?php $this->place->emptyPlace(2) ?>
                </div>
                <div id="selected" style="margin-bottom: 100px;">
                    <?php $this->place->currentPlace(2) ?>
                </div>
            </div>

            <!-- place 3 -->
            <div class="position-absolute top-0 offset-2 place" id="place-3" style="margin-top: 200px; margin-left: 245px;">
                <!-- TODO: code subtema here -->
                <div id="code" hidden><?= $listSubtema[2]->id ?></div>
                <div id="empty">
                    <?php $this->place->emptyPlace(3) ?>
                </div>
                <div id="selected" style="margin-left: -15px; margin-top: -27px">
                    <?php $this->place->currentPlace(3) ?>
                </div>
            </div>

            <!-- place 4 -->
            <div class="position-absolute top-0 offset-2 place" id="place-4" style="margin-top: 100px; margin-left: 221px;">
                <!-- TODO: code subtema here -->
                <div id="code" hidden><?= $listSubtema[3]->id ?></div>
                <div id="empty">
                    <?php $this->place->emptyPlace(4) ?>
                </div>
                <div id="selected" style="margin-left: -17px; margin-top: -27px;">
                    <?php $this->place->currentPlace(4) ?>
                </div>
            </div>

            <!-- place 5 -->
            <div class="position-absolute top-0 offset-2 place" id="place-5" style="margin-top: 64px; margin-left: 381px;">
                <!-- TODO: code subtema here -->
                <div id="code" hidden><?= $listSubtema[4]->id ?></div>
                <div id="empty">
                    <?php $this->place->emptyPlace(5) ?>
                </div>
                <div id="selected" style="margin-left: -17px; margin-top: -27px;">
                    <?php $this->place->currentPlace(5) ?>
                </div>
            </div>

            <!-- place 6 -->
            <div class="position-absolute top-0 offset-2 place" id="place-6" style="margin-top: 37px; margin-left: 248px;">
                <!-- TODO: code subtema here -->
                <div id="code" hidden><?= $listSubtema[5]->id ?></div>
                <div id="empty">
                    <?php $this->place->emptyPlace(6) ?>
                </div>
                <div id="selected" style="margin-left: -17px; margin-top: -27px;">
                    <?php $this->place->currentPlace(6) ?>
                </div>
            </div>


        </div>
        <!-- end maps page -->

        <!-- student information -->
        <div class="position-absolute bottom-0 end-0 mb-4">
            <div class="text-right pe-5 text-black">
                <!-- name -->
                <div class="mb-2 text-capitalize">
                    <?php
                    if ($student->name != null && $student->name != "") {
                        echo $student->name;
                    } else {
                        echo "Student Name";
                    }
                    ?>
                </div>
                <!-- no. absen -->
                <div class="mb-2">
                    <?php
                    if ($student->noAbsen != null && $student->noAbsen != "") {
                        echo $student->noAbsen;
                    } else {
                        echo "No Absen";
                    }
                    ?>
                </div>
                <!-- score -->
                <button id="scores" type="button" class="btn btn-primary border border-white bg-white text-black">Lihat Nilai Pengerjaan</button>
            </div>
        </div>

    </div>

    <script>
        const totalPlaces = 6
        for (let i = 1; i <= totalPlaces; i++) {
            let place = document.getElementById(`place-${i}`);

            if (i === 1) {
                place.querySelector("#empty").setAttribute("hidden", "")
            } else {
                place.querySelector("#selected").setAttribute("hidden", "")
            }

            place.addEventListener("click", async function() {
                place.querySelector("#empty").setAttribute("hidden", "")
                place.querySelector("#selected").removeAttribute("hidden")

                for (let j = 1; j <= totalPlaces; j++) {
                    if (j == i) {
                        continue
                    } else {
                        let emptyPlace = document.getElementById(`place-${j}`)
                        emptyPlace.querySelector("#selected").setAttribute("hidden", "")
                        emptyPlace.querySelector("#empty").removeAttribute("hidden")
                    }

                }

                // if (window.confirm(`Lanjutkan untuk membuka Subtema ${i}?`)) {
                window.location.href = '<?= base_url() ?>student/materi/' + place.querySelector("#code").textContent;
                // }
            })
        }

        // redirect btn to scores
        let scoresButton = document.getElementById("scores")
        scoresButton.addEventListener(`click`, function() {
            // TODO: passed student id here
            window.location.href = '<?= base_url() ?>student/nilai/11';
        })
    </script>

    <?php
    // enable navigation place
    // $this->place->enableNavigation();
    ?>

    <!-- footer scripts -->
    <?php
    $this->basic->footerScripts();
    $this->basic->scriptsBootstrap();
    ?>
</body>

</html>