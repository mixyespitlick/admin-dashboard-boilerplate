<?php

use Illuminate\Database\Eloquent\Model;
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
        // $this->call(UsersTableSeeder::class);

        //Dissable mass assignment
        Model::unguard();
        // $this->call(DriverSeeder::class);
        $this->call(VehicleTypeTableSeeder::class);
        $this->call(ServiceProviderTypeSeeder::class);
        $this->call(ServiceProviderSeeder::class);
        $this->call(AreaTableSeeder::class);
        $this->call(CollectionPointSeeder::class);
        $this->call(VehicleSeeder::class);
        //Enable mass assignment
        Model::reguard();
    }
}
