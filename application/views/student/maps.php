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
                <?php $this->place->currentPlace(1) ?>
            </div>

            <!-- place 2 -->
            <div class="position-absolute top-50 place" id="place-2" style="margin-left: 300px; margin-top: 10px;">
                <?php $this->place->emptyPlace(2) ?>
            </div>

            <!-- place 3 -->
            <div class="position-absolute top-0 offset-2 place" id="place-2" style="margin-top: 200px; margin-left: 245px;">
                <?php $this->place->emptyPlace(3) ?>
            </div>

            <!-- place 4 -->
            <div class="position-absolute top-0 offset-2 place" id="place-2" style="margin-top: 100px; margin-left: 221px;">
                <?php $this->place->emptyPlace(4) ?>
            </div>

            <!-- place 5 -->
            <div class="position-absolute top-0 offset-2 place" id="place-2" style="margin-top: 64px; margin-left: 381px;">
                <?php $this->place->emptyPlace(5) ?>
            </div>

            <!-- place 6 -->
            <div class="position-absolute top-0 offset-2 place" id="place-2" style="margin-top: 37px; margin-left: 248px;">
                <?php $this->place->emptyPlace(6) ?>
            </div>

        </div>
        <!-- end maps page -->

        <!-- student information -->
        <div class="position-absolute bottom-0 end-0 mb-4">
            <div class="text-right pe-5 text-black">
                <!-- name -->
                <div class="mb-2 text-capitalize">
                    <?php
                    if ($student["name"] != null && $student["name"] != "") {
                        echo $student["name"];
                    } else {
                        echo "Student Name";
                    }
                    ?>
                </div>
                <!-- no. absen -->
                <div class="mb-2">
                    <?php
                    if ($student["absenCode"] != null && $student["absenCode"] != "") {
                        echo $student["absenCode"];
                    } else {
                        echo "No Absen";
                    }
                    ?>
                </div>
                <!-- score -->
                <button type="button" class="btn btn-primary border border-white bg-white text-black">Lihat Nilai Pengerjaan</button>
            </div>
        </div>

    </div>


    <!-- maps scripts -->
    <!-- <script src="<?= base_url() ?>assets/js/maps.js"></script> -->

    <script>
        // TODO: added functionality here
        let places = document.getElementsByClassName('place');

        for (let i = 0; i < places.length; i++) {
            places[i].addEventListener("click", function() {
                alert(places[i].textContent)
                let current = document.getElementById("current-place")
                current.setAttribute("class", current.className.replace("current-place", "place"))
                places[i].setAttribute("class", places[i].className.replace("place", "current-place"))
            });
        }
    </script>

    <!-- footer scripts -->
    <?php
    $this->basic->footerScripts();
    $this->basic->scriptsBootstrap();
    ?>
</body>

</html>