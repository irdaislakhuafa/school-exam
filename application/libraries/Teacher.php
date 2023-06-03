<?php
class Teacher
{
    public function avatarProfileImg($name = "Hello World")
    { ?>
        <div class="card col-2 rounded-5 shadow float-start">
            <div class="justify-content-center align-items-center mt-2">
                <img src="<?= base_url() ?>assets/images/teacher-home-avatar.png" class="rounded card-img-top" style="width: 151px;" alt="" srcset="">
                <hr>
                <div class="text-center font-weight-bold fs-20 mt-3 mb-3 text-capitalize"><?= $name ?></div>
            </div>
        </div>
<?php }
}
