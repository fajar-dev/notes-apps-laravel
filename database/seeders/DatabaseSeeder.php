<?php

namespace Database\Seeders;

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
        DB::table('notes')->insert([
            'title' => Str::random(10),
            'content' => Str::random(50),
        ]);
    }
}
