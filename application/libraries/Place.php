<?php
class Place
{
    public function currentPlace(int $place = 0)
    { ?>
        <div id="current">
            <span class="position-absolute rounded-5 text-black ms-4 mt-2 fs-20 z-1"><?= $place ?></span>
            <img src="<?= base_url() ?>assets/images/current-place.png" class="z-0" style="width: 60px;" alt="" srcset="">
        </div>
    <?php }

    public function emptyPlace(int $place = 0)
    { ?>
        <span id="empty" class="badge bg-transparent border border-2 rounded-5 border-black text-black fs-20 w-100"><?= $place ?></span>
    <?php
    }

    public function enableNavigation()
    { ?>

<?php }
}
