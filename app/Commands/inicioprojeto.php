<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class inicioprojeto extends BaseCommand
{
   protected $group =  'custom';
   protected $name =  'start';
   protected $description = 'Dar inicio no projeto!';
    

   public function run (array $params)
   {
    // pasta do projeto
    $pasta_projeto = 'C:\xampp\htdocs\MicroPlanner';
    // pasta onde esta o php no sistema 
    $phpPath = 'C:\xampp\php\php.exe';

    //fazer migrate
    CLI::write('Fazendo a migração de dados', 'blue');
    system("{$phpPath} {$pasta_projeto}\spark migrate ");

    // rodar seeder
    CLI::write('Colocando dados nas tabelas', 'yellow');
    system("{$phpPath} {$pasta_projeto}\spark db:seed DatabaseSeeder");

   }
}
