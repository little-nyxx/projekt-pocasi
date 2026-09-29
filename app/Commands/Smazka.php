<?php

namespace App\Commands;

use App\Models\Data;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class Smazka extends BaseCommand
{
    protected $group = 'Maintenance';

    protected $name = 'smazka';

    protected $description = 'Automaticky označí jako smazané záznamy starší než 11 let.';

    protected $usage = 'smazka';

    public function run(array $params)
    {
        $years = 11;

        if ($years < 1) {
            CLI::error('Počet let musí být alespoň 1.');
            return;
        }

        $cutoff = date('Y-m-d H:i:s', strtotime('-' . $years . ' years'));

        $model = new Data();

        $oldRows = $model
            ->select('id')
            ->where('date <', $cutoff)
            ->findAll();

        $count = count($oldRows);

        if ($count === 0) {
            CLI::write('Nebyly nalezeny žádné záznamy starší než ' . $years . ' let.', 'yellow');
            CLI::newLine();

            return;
        }

        $ids = array_map(static fn ($row) => $row->id, $oldRows);
        $model->delete($ids);

        CLI::write('Počet označených záznamů: ' . $count . '. Záznamy starší než ' . $years . ' let byly označeny jako smazané.', 'green');
        CLI::newLine();
    }
}