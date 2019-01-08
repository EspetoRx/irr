<?php

use Illuminate\Database\Seeder;
use App\CategoriasBlog;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categoria = new CategoriasBlog;
        $categoria->name = 'Categoria 1';
        $categoria->slug = 'Categoria 1';
        $categoria->image = 'categoriasblog1546553279.jpg';
        $categoria->save();
    }
}
