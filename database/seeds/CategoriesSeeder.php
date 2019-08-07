<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('categories')->insert([
            'id' => 1,
            'name' => 'General',
            'slug' => 'general',
            'description' => 'General category for blog contents',
            'author_id' => 26,
        ]);
        DB::table('categories')->insert([
            'id' => 1,
            'name' => 'General Content',
            'slug' => 'general',
            'description' => 'General category for blog contents',
            'author_id' => 25,
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
