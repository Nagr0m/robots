<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
                [
                        'title' => 'Métal',
                ],
                [
                        'title' => 'Or',
                ],
                [
                        'title' => 'Cuivre',
                ],
                [
                        'title' => 'Fer',
                ],
                [
                        'title' => 'Acier',
                ],
                [
                        'title' => 'Carton',
                ],
                [
                        'title' => 'Inox',
                ],
                [
                        'title' => 'Rouge',
                ],
                [
                        'title' => 'Bleu',
                ],
                [
                        'title' => 'Vert',
                ],
                [
                        'title' => 'Rose',
                ],
        ]);
    }
}
