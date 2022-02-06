<?php

use App\CollectionPoint;
use Illuminate\Database\Seeder;

class CollectionPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(CollectionPoint::class, 60)->create();
    }
}
