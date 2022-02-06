<?php

use App\ServiceProviderType;
use Illuminate\Database\Seeder;

class ServiceProviderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(ServiceProviderType::class, 4)->create();
    }
}
