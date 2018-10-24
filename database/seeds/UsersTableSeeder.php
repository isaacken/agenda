<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'name' => 'Administrador',
          'email' => 'admin@admin.com',
          'password' => bcrypt('secret'),
          'created_at' => date('Y-m-d H:i:s')
        ]);

        factory(App\User::class,5)->create();
    }
}
