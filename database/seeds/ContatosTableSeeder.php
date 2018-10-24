<?php

use Illuminate\Database\Seeder;

class ContatosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contatos')->insert([
          'saudacao' => 'Exmo.',
          'nome' => 'Isaac Kennedy',
          'telefone' => '(19) 99999-9999',
          'data_nascimento' => '1998/10/01',
          'email' => 'isaackennedyfds@gmail.com',
          'nota' => 'Usuário criado usando seeder com DB',
          'created_at' => date('Y-m-d H:i:s')
        ]);

        factory(App\Contato::class, 20)->create();
    }
}
