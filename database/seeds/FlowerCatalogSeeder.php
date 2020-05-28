<?php

use Illuminate\Database\Seeder;

class FlowerCatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\FlowerCatalog::class, 5)->create();
    }
}
