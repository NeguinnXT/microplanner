<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Notificacao extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'remetente' => [
                'type'       => 'VARCHAR',
                'constraint' => '100'
            ],
            'assunto' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'resumo' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'data' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false
            ],

            'destinatario_id' => [
                'type'       => 'INT',
                'unsigned'   => true
            ],
            'lida' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0
            ],
            'excluida' => [
                'type'       => 'BOOLEAN',
                'default'    => false,
                'after'      => 'lida'
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_notificacoes');
    }

    public function down()
    {
        $this->forge->dropTable('tb_notificacoes');
    }
}
