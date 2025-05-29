<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Login extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],

            'Nome' => [
                'type'       => 'VARCHAR',
                'constraint' => 35
            ],
            'Email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false
            ],
            'IP' => [
                'type'       => 'VARCHAR',
                'constraint' => 45,
                'null'       => false
            ],
            'Telefone' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true
            ],
            'Cargo' => [
                'type'       => 'ENUM',
                'constraint' => ['Programador', 'CEO', 'Gerente', 'Coordenador', 'Analista', 'Técnico', 'Cliente'],
                'default'    => 'Cliente'
            ],
            'num_pessoas' => [
                'type'       => 'ENUM',
                'constraint' => ['1-5', '6-20', '21-50', '51-100', '100+'],
                'default'    => '1-5'

            ],
            'empresa' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true
            ],
            'Senha' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true
            ],
            'Foto' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true
            ],
            'online_status' => [
                'type'       => 'ENUM',
                'constraint' => ['online', 'Offline'],
                'default'    => 'Offline'
            ],
            'session_token' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true
            ],
            'tentativas_falhas' => [
                'type'    => 'INT',
                'default' => 0,
            ],
            'ultimo_tentativa' => [
                'type'    => 'INT',
                'default' => 0,
            ],
            'userlogger' => [
                'type'       => 'BOOLEAN',
                'default'    => true,
            ],

        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->addUniqueKey('Email');
        $this->forge->addUniqueKey('Telefone');
        $this->forge->createTable('tb_accounts');
        $db = \Config\Database::connect();
        $db->query("ALTER TABLE tb_accounts AUTO_INCREMENT = 1000");
    }

    public function down()
    {
        $this->forge->dropTable('tb_accounts');
    }
}
