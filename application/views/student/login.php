<!DOCTYPE html>
<html lang="en">

<?php
$this->basic->header("Login Siswa");
$this->basic->headerBootstrap();
?>

<body>
    <!-- <div class="limiter bg-student-login">
        <div class="position-relative m-4">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="./assets/images/img-01.png" alt="IMG">
                </div>

                <form class="login100-form validate-form">
                    <span class="login100-form-title">
                        Member Login
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="pass" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="assets/#">
                            Username / Password?
                        </a>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="assets/#">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div> -->

    <div class="position-relative py-2 pt-5 px-4 align-content-center">
        <h1 class="text-uppercase font-weight-bold mb-5 fs-30 text-center">halaman login siswa</h1>
        <!-- start card -->
        <div class="card p-4 shadow  fs-24 start-50 rounded-3 translate-middle-x " style="width: 40rem; height: max-content">
            <div class="card-body">
                <!-- name of student -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Siswa</label>
                    <div class="input-group mb-3">
                        <input id="name" name="name" type="text" class="form-control" placeholder="Masukan Nama" aria-label="Masukan Nama" aria-describedby="basic-addon2">
                    </div>
                </div>
                <!-- absen code of student -->
                <div class="mb-3">
                    <label for="name" class="form-label">No. Absen</label>
                    <div class="input-group mb-3">
                        <input id="name" name="name" type="text" class="form-control" placeholder="Masukan No. Absen" aria-label="Masukan No. Absen" aria-describedby="basic-addon2">
                    </div>
                </div>
                <!-- class code of student -->
                <div class="mb-3">
                    <label for="name" class="form-label">Kode</label>
                    <div class="input-group mb-3">
                        <input id="name" name="name" type="text" class="form-control" placeholder="Masukan Kode" aria-label="Masukan Kode" aria-describedby="basic-addon2">
                    </div>
                </div>
            </div>

            <!-- login button -->
            <div class="d-flex align-items-center justify-content-center">
                <button type="submit" class="btn btn-info w-25">Masuk</button>
            </div>
        </div>
        <!-- end card -->
    </div>

    <!-- footer scripts -->
    <?php
    $this->basic->footerScripts();
    $this->basic->scriptsBootstrap();
    ?>
</body>

</html>