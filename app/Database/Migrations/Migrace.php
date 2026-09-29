<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDeletedAtToData extends Migration
{
    public function up()
    {
        $fields = [
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ];

        $this->forge->addColumn('data', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('data', 'deleted_at');
    }
}