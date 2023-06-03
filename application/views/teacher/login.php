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
        <form action="<?= base_url() ?>teacher/login" method="post">
            <div class="position-absolute top-0 start-50 translate-middle-x mt-5">
                <h1 class="text-uppercase font-weight-bold mb-5 fs-30 text-center text-white">halaman login guru</h1>
                <!-- start card -->
                <div class="card p-4 shadow  fs-24 rounded-4 " style="width: 40rem; height: max-content">
                    <div class="card-body">
                        <!-- name of student -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Login Guru</label>
                            <div class="input-group mb-3">
                                <input id="email" name="email" type="email" class="form-control rounded-3" placeholder="Email" aria-label="Email" aria-describedby="basic-addon2">
                            </div>
                        </div>
                        <!-- absen code of student -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group mb-3">
                                <input id="password" name="password" type="password" class="form-control rounded-3" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2">
                            </div>
                        </div>
                    </div>

                    <!-- error message -->
                    <?php
                    $error = $this->session->flashdata('error');
                    if ($error != null || $error != "") {
                    ?>
                        <div class="d-flex justify-content-center">
                            <div id="error" class="alert w-75  text-capitalize fs-16 alert-danger" role="alert">
                                <?= $error ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <!-- TODO: added functionality here -->
                    <!-- login button -->
                    <div class="d-flex align-items-center justify-content-center">
                        <button type="submit" class="btn shadow btn-info w-25">Masuk</button>
                    </div>
                </div>
                <!-- end card -->
            </div>
        </form>
        <!-- end login page -->
    </div>

    <script>
        // hide error after 3 seconds
        setTimeout(function() {
            document.getElementById("error").setAttribute("hidden", "");
        }, 3000);
    </script>

    <!-- footer scripts -->
    <?php
    $this->basic->footerScripts();
    $this->basic->scriptsBootstrap();
    ?>
</body>

</html>