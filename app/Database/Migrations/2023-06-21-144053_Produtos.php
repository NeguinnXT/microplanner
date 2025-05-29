<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produtos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'Nome' => [
                'type'       => 'VARCHAR',
                'constraint' => 128
            ],
            'utilizador_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => false
            ],
            'Qtde' => [
                'type' => 'INT'
            ],
            'Valor' => [
                'type' => 'DOUBLE'
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true
            ],
            'Categoria' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true
            ],
            'SKU' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_produtos');
        $this->forge->addForeignKey('utilizador_id', 'tb_accounts', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->forge->dropTable('tb_produtos');
    }
}
