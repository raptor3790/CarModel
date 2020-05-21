<?php

use App\Models\VehicleModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_models')->delete();

        VehicleModel::truncate()->insert([
            ["make" => "BMW", "model" => "3 Series"],
            ["make" => "BMW", "model" => "5 Series"],
            ["make" => "BMW", "model" => "7 Series"],
            ["make" => "Mercedes", "model" => "C Class"],
            ["make" => "Mercedes", "model" => "E Class"],
            ["make" => "Mercedes", "model" => "S Class"],
            ["make" => "Jeep", "model" => "Wrangler"],
            ["make" => "Jeep", "model" => "Cherokee"],
            ["make" => "Jeep", "model" => "Grand Cherokee"],
        ]);
    }
}
