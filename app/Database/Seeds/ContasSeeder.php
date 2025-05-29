<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ContasSeeder extends Seeder
{
    public function run()
    {
        $contas = [
            [
                'Nome' => 'Joelson Almeida',
                'Email'  => 'joelson@gmail.com',
                'IP' => '127.0.0.1',
                'Telefone' => '932458220',
                'Cargo' => 'Programador',
                'Foto' => 'uploads/perfis/1745226956_8e8798aa02cffc86e96b.jpg',
                'Senha' => password_hash('vmhxj3ug123', PASSWORD_DEFAULT),
            ],
            [
                'Nome' => 'Almeida Joelson',
                'Email'  => 'almeida@gmail.com',
                'IP' => '127.0.0.1',
                'Telefone' => '932458221',
                'Cargo' => 'Cliente',
                'Foto' => 'uploads/users/1746194475_d911444350df3a545e96.jpg',
                'Senha' => password_hash('vmhxj3ug123', PASSWORD_DEFAULT),
            ],
            ];

            foreach($contas as $user) {
                $this->db->table('tb_accounts')->insert($user);
            }
    }
}
