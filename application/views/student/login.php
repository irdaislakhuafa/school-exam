<!DOCTYPE html>
<html lang="en">

<?php
$this->basic->header("Login Siswa");
$this->basic->headerBootstrap();
?>

<body class="default-backgound-color">
    <div class="position-relative py-2 h-100 pt-5 px-4 align-content-center">
        <!-- show tiny islands -->
        <?php $this->island->showTinyIslands() ?>

        <!-- start login page -->
        <div class="position-absolute top-0 start-50 translate-middle-x mt-5">
            <h1 class="text-uppercase font-weight-bold mb-5 fs-30 text-center text-white">halaman login siswa</h1>
            <!-- start card -->
            <form action="<?= base_url() ?>student/authlogin" method="post">
                <div class="card p-4 shadow  fs-24 rounded-4 " style="width: 40rem; height: max-content">
                    <div class="card-body">
                        <!-- name of student -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Siswa</label>
                            <div class="input-group mb-3">
                                <input id="name" required name="name" type="text" class="form-control rounded-3" placeholder="Masukan Nama" aria-label="Masukan Nama" aria-describedby="basic-addon2">
                            </div>
                        </div>
                        <!-- absen code of student -->
                        <div class="mb-3">
                            <label for="absenCode" class="form-label">No. Absen</label>
                            <div class="input-group mb-3">
                                <input id="absenCode" required name="absenCode" type="text" class="form-control rounded-3" placeholder="Masukan No. Absen" aria-label="Masukan No. Absen" aria-describedby="basic-addon2">
                            </div>
                        </div>
                        <!-- class code of student -->
                        <div class="mb-3">
                            <label for="classCode" class="form-label">Kode</label>
                            <div class="input-group mb-3">
                                <input id="classCode" required name="classCode" type="text" class="form-control rounded-3" placeholder="Masukan Kode" aria-label="Masukan Kode" aria-describedby="basic-addon2">
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

                    <!-- login button -->
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="<?= base_url() ?>student/register" class="btn shadow btn-info w-25">Daftar</a>
                        <button type="submit" class="btn shadow btn-success w-25">Masuk</button>
                    </div>
                </div>
            </form>
            <!-- end card -->
        </div>
    </div>
    <!-- end login page -->

    <!-- footer scripts -->
    <?php
    $this->basic->footerScripts();
    $this->basic->scriptsBootstrap();
    ?>
</body>

</html>