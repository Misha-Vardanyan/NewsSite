<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();
       // $this->call(CategorySeeder::class);
       // News::factory(15)->create();
        User::factory(5)->create();


        $this->call(AdminSeeder::class);



    }
}
