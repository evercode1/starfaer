<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Utilities\FetchInsideArrayFile;

class PlanetSeeder extends Seeder
{

    public $file;


    public function __construct($file)
    {

        $this->file = $file;

    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $file = base_path('seeds/' . $this->file . '.php');


        DB::table('planets')->truncate();

        $values = FetchInsideArrayFile::get($file);


        $planetTypes = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11,
            12, 13, 14, 15, 16, 17, 18, 19, 20,
            21, 22, 23, 24, 25, 26, 27, 28, 29,
            30, 31, 32, 33, 34
        ];


        foreach( $values as $key => $value){

            $planetType = array_rand($planetTypes, 1) + 1;


            DB::table('planets')->insert([
                'name' => $value,
                'slug' => str_slug($value, "-"),
                'planet_type_id' => $planetType,
                'atmosphere_id' => rand(1,9),
                'star_id' => rand(1, 1007),
                'planet_detail_id' => 0,
                'universe_id' => 1,
                'galaxy_id' => 3,
                'mass' => rand(50, 1000),
                'atmospheric_density' => rand(15, 90),
                'planet_number_from_star' => rand(1, 15),
                'moon_count' => rand(0,2),
                'ocean_count' => 0,
                'continent_count' => 0,
                'is_life_present' => 0,
                'is_in_goldilocks_zone' => 0,
                'is_ringed' => 0,
                'coordinates' => rand(1,259),
                'is_active' => 1,
                'description' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }




    }
}
