<?= $this->extend('layout/sablona'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1>Přehled meteorologických stanic ve spolkové zemi <?= $zeme->name ?></h1>
    <div class="row">
    <?php 
    foreach($stanice as $row){
      $flag = array(
        'src' => base_url('obrazky/vlajky/'.$row->flag),
        'class' => 'card-img-bottom'
    );
      
        ?>
        
        <div class="card col-lg-4">
        <div class="card-header">
           <h4> <?= anchor('udaje/'.$row->S_ID, $row->place) ?> </h4>
        </div>
        <div class="card-body">
          <p class="card-text">Zeměpisná šířka <?= $row->geo_latitude?></p>
          <p class="card-text">Zeměpisná délka <?= $row->geo_longtitude?></p>
          <p class="card-text">Nadmořská výška <?= $row->height?></p>
        </div>
        </div>
        
      
      <?php
        }

      
     ?>  
    </div>    
</div>  
    
    

<?=$this->endSection(); ?>