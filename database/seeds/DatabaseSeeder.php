<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $i = 0;
        for($i=0;$i<=100;$i++)
        {
        DB::table('recipes')->insert([
            'title' => Str::random(5),
            'instructions' => Str::random(5),
            'ingredients' => Str::random(5),
            'time' => Str::random(5),
            'servings' => Str::random(5),
            'nutrition' => Str::random(5),
            'type' => 'Non-Veg'
        ]);
        }
    }
}
