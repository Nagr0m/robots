<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
                [
                        'name' => 'admin',
                        'email' => 'admin@robot.fr',
                        'password' => bcrypt('aaaaaa'),
                        'role' => 'administrator',
                ],
                [
                        'name' => 'toto',
                        'email' => 'toto@robot.fr',
                        'password' => bcrypt('bbbbbb'),
                        'role' => 'editor',
                ],
               
        ]);
    }
}
