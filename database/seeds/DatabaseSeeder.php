<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(RoleTableSeeder::class);
         $this->call(CitiesTableSeeder::class);
         //$this->call(UserTableSeeder::class);
         //$this->call(ArticleSeeder::class);
         //$this->call(ServiceTableSeeder::class);
         $this->call(AdminSeeder::class);


    }
}