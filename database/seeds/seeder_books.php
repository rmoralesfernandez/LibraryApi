<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class seeder_books extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'title' => 'Jonny Zumba',
            'description' => 'Libro de prueba',
        ]);
    }
}
