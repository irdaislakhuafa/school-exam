<?php
class Island
{
    public function showTinyIslands()
    { ?>
        <!-- tidy island 1 -->
        <div>
            <img src="<?= base_url() ?>assets/images/tiny-island-1.png" class="tiny-island ms-3" alt="island 1">
        </div>

        <!-- tidy island 2 -->
        <div class="position-absolute offset-10 pt-5 mt-5">
            <img src="<?= base_url() ?>assets/images/tiny-island-2.png" class="tiny-island" alt="island 1">
        </div>

        <!-- tidy island 3 -->
        <div class="position-absolute top-50 offset-1 pt-5 mt-5">
            <img src="<?= base_url() ?>assets/images/tiny-island-3.png" class="tiny-island" alt="island 1">
        </div>
<?php
    }
}
