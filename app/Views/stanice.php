<?= $this->extend('layout/sablona'); ?>

<?= $this->section('content'); ?>
<div class="container">
        <h1><?= $stanice->place ?></h1>
        <p><?= $stanice->geo_latitude ?></p>
        <p><?= $stanice->geo_longtitude ?></p>
        <p><?= $stanice->height ?></p>
            
    </div>

<?=$this->endSection(); ?>