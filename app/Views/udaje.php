<?= $this->extend('layout/sablona'); ?>

<?= $this->section('content'); ?>
<h1>Přehled údajů ze stanice <?= $stanice->place ?></h1>
<?php
    $table = new \CodeIgniter\View\Table();
    $table->setHeading('Datum měření', 'Vlhkost', 'Střední vítr', 'Max vítr', 'Délka slunka', 'Střední tlak vzduchu');

    foreach($udaje as $row){
        $table->addRow($row->date, $row->humidity, $row->mid_wind, $row->max_wind, $row->sun_length, $row->mid_air_pressure);
    }

    $template = array(
        'table_open'=> '<table class="table table-bordered">',
        'thead_open'=> '<thead>',
        'thead_close'=> '</thead>',
        'heading_row_start'=> '<tr>',
        'heading_row_end'=>' </tr>',
        'heading_cell_start'=> '<th>',
        'heading_cell_end' => '</th>',
        'tbody_open' => '<tbody>',
        'tbody_close' => '</tbody>',
        'row_start' => '<tr>',
        'row_end'  => '</tr>',
        'cell_start' => '<td>',
        'cell_end' => '</td>',
        'row_alt_start' => '<tr>',
        'row_alt_end' => '</tr>',
        'cell_alt_start' => '<td>',
        'cell_alt_end' => '</td>',
        'table_close' => '</table>'
        );
        
        $table->setTemplate($template);
        echo $table->generate();
      
?>

<?=$this->endSection(); ?>