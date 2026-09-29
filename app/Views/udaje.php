<?= $this->extend('layout/sablona'); ?>

<?= $this->section('content'); ?>
<h1>Přehled údajů ze stanice <?= $stanice->place ?></h1>
<div class="mb-3">
  <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#bulkDeleteModal">
    Vymazat podle měsíce a roku
  </button>
</div>

<div class="modal fade" id="bulkDeleteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Mazání podle měsíce a roku</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="post" action="<?= base_url('udaje/delete-month/' . $stanice->S_ID) ?>">
        <?= csrf_field() ?>
        <div class="modal-body">
          <div class="mb-3">
            <label for="deleteMonth" class="form-label">Měsíc</label>
            <select class="form-select" id="deleteMonth" name="month" required>
              <option value="">Vyberte měsíc</option>
              <option value="1">Leden</option>
              <option value="2">Únor</option>
              <option value="3">Březen</option>
              <option value="4">Duben</option>
              <option value="5">Květen</option>
              <option value="6">Červen</option>
              <option value="7">Červenec</option>
              <option value="8">Srpen</option>
              <option value="9">Září</option>
              <option value="10">Říjen</option>
              <option value="11">Listopad</option>
              <option value="12">Prosinec</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="deleteYear" class="form-label">Rok</label>
            <input type="number" class="form-control" id="deleteYear" name="year" min="1900" max="2100" required>
          </div>
          <p class="mb-0">Tato akce smaže všechny záznamy pro vybranou stanici v daném měsíci a roce.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zrušit</button>
          <button type="submit" class="btn btn-warning">Vymazat záznamy</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
    $table = new \CodeIgniter\View\Table();
  $table->setHeading('Datum měření', 'Vlhkost', 'Střední vítr', 'Max vítr', 'Délka slunka', 'Střední tlak vzduchu', 'Vymazat');

  $idModal = 0;

    foreach($udaje as $row){
       // strtotime($row->date);
        $table->addRow(
            date("d. m. Y", strtotime($row->date)),
            $row->humidity,
            $row->mid_wind,
            $row->max_wind,
            $row->sun_length,
            $row->mid_air_pressure,
      '<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#myModal' . $idModal . '">Vymazat</button>'
        );

        ?>
               <!-- The Modal -->
    <div class="modal fade" id="myModal<?=$idModal?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

      <!-- Modal Header -->
        <div class="modal-header">
      <h4 class="modal-title">Potvrdit vymazání</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

      <!-- Modal body -->
        <div class="modal-body">
      Opravdu chcete vymazat záznam z <strong><?= date("d. m. Y", strtotime($row->date)) ?></strong>?
        </div>

      <!-- Modal footer -->
        <div class="modal-footer">
    <form method="post" action="<?= base_url('udaje/delete/' . $row->id) ?>">
      <?= csrf_field() ?>
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zrušit</button>
      <button type="submit" class="btn btn-danger">Vymazat</button>
    </form>
        </div>

    </div>
  </div>
</div>
            <?php
            $idModal++;
        //strtotime($row->date);
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
        echo $pager->links();
      
?>

<?=$this->endSection(); ?>