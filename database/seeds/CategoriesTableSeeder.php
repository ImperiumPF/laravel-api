<?php

use Imperium\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = new Category();
        $cat->name = 'Bibliotecas';
        $cat->description = 'Bibliotecas';
        $cat->save();

        $cat = new Category();
        $cat->name = 'Jardins';
        $cat->description = 'Espaços verdes';
        $cat->save();
    }
}
