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

        $atmosphereId = '';

        $density = '';

        $mass = '';

        $moonCount = 0;

        $oceanCount = 0;

        $life = 0;

        $goldilocks = 0;

        $continentCount = 0;

        $ring = 0;

        $choices = [3, 5, 6, 7, 8, 9];

        $mesoChoices = [2, 3, 5, 9];


        $planetTypes = [1 =>'terrestial planet', 2 => 'dwarf planet', 3 => 'gas giant',
                        5 => 'super earth', 6 => 'hot jupiter', 7 => 'protoplanet',
                        9 => 'super neptune', 10 => 'ice planet',
                        13 => 'earth analog',
                        15 => 'ocean planet', 17 => 'mesoplanet', 18 => 'hot neptune',
                        19 => 'super jupiter', 20 => 'lava planet', 21 => 'sub earth',
                        23 => 'mini-neptune', 24 => 'ice giant', 25 => 'iron planet',
                        26 => 'puffy planet', 27 => 'helium planet', 28 => 'gas dwarf', 29 => 'silicate planet',
                        30 => 'desert planet', 32 => 'city planet',
                        33 => 'carbon planet'
               ];


        foreach( $values as $key => $value){

            $planetType = array_rand($planetTypes);

            switch($planetType){


                case 1 :

                    $atmosphereId = 2;

                    $mass = rand(100, 200);

                    $density = rand(70, 100);

                    $moonCount = rand(0, 2);

                    $oceanCount = rand(0, 6);

                    $continentCount = rand(1, 6);

                    $life = 1;

                    $goldilocks = 1;

                    $ring = 0;


                    break;

                case 2 :

                    $atmosphereId = rand(2,5);

                    $mass = rand(50, 80);

                    $density = rand(40, 100);

                    $moonCount = 0;

                    $oceanCount = rand(0, 2);

                    $continentCount = rand(1, 3);

                    $atmosphereId == 2 ? $life = 1 : $life = 0;

                    $atmosphereId == 2 ? $goldilocks = 1 : $goldilocks = 0;

                    $ring = 0;

                    break;

                case 3 :

                    $atmosphereId = 1;

                    $mass = rand(30000, 60000);

                    $density = rand(89, 100);

                    $moonCount = rand(12,22);

                    $oceanCount = 0;

                    $continentCount = 0;

                    $life = 0;

                    $goldilocks = 0;

                    $rings = [0, 1, 0, 0, 0, 0, 0];

                    $result = array_rand($rings);

                    $ring = $rings[$result];


                    break;

                case 5 :

                    $atmosphereId = 2;

                    $mass = rand(300, 600);

                    $density = rand(70, 100);

                    $moonCount = rand(0, 3);

                    $oceanCount = rand(1, 12);

                    $continentCount = rand(1, 10);

                    $life = 1;

                    $goldilocks = 1;

                    $ring = 0;

                    break;

                case 6 :

                    $atmosphereId = 1;

                    $mass = rand(30000, 60000);

                    $density = rand(89, 100);

                    $moonCount = rand(12, 22);

                    $oceanCount = 0;

                    $continentCount = 0;

                    $life = 0;

                    $goldilocks = 0;

                    $rings = [0, 1, 0, 0, 0, 0, 0];

                    $result = array_rand($rings);

                    $ring = $rings[$result];

                    break;

                case 7 :

                    $result = array_rand($choices);

                    $atmosphereId = $choices[$result];

                    $mass = rand(100, 200);

                    $density = rand(12, 38);

                    $oceanCount = 0;

                    $continentCount = 1;

                    $life = 0;

                    $goldilocks = 0;

                    $ring = 0;

                    break;

                case 9 :

                    $atmosphereId = 10;

                    $mass = rand(1700, 4500);

                    $density = rand(89, 100);

                    $moonCount = rand(0, 5);

                    $oceanCount = 0;

                    $continentCount = 0;

                    $life = 0;

                    $goldilocks = 0;

                    $rings = [0, 1, 0, 0, 0, 0, 0];

                    $result = array_rand($rings);

                    $ring = $rings[$result];

                    break;

                case 10 :

                    $atmosphereId = 11;

                    $mass = rand(90, 200);

                    $density = rand(70, 100);

                    $moonCount = rand(0, 2);

                    $oceanCount = rand(1, 3);

                    $continentCount = rand(0, 5);

                    $life = rand(0, 1);

                    $goldilocks = 0;

                    $rings = [0, 1, 0, 0, 0, 0, 0];

                    $result = array_rand($rings);

                    $ring = $rings[$result];

                    break;

                case 13 :

                    $atmosphereId = 2;

                    $mass = rand(100, 300);

                    $density = rand(69, 100);

                    $moonCount = rand(0, 2);

                    $oceanCount = rand(1, 2);

                    $continentCount = rand(1, 8);

                    $life = 1;

                    $goldilocks = 1;

                    $rings = [0, 1, 0, 0, 0, 0, 0];

                    $result = array_rand($rings);

                    $ring = $rings[$result];

                    break;


                case 15 :

                    $atmosphereId = 2;

                    $mass = rand(100, 200);

                    $density = rand(69, 100);

                    $moonCount = rand(0, 2);

                    $oceanCount = 1;

                    $continentCount = 0;

                    $life = 1;

                    $goldilocks = 1;

                    $ring = 0;

                    break;

                case 17 :

                    $result  = array_rand($mesoChoices);

                    $atmosphereId = $mesoChoices[$result];

                    $mass = rand(40, 85);

                    $density = rand(39, 100);

                    $moonCount = 0;

                    $oceanCount = rand(0, 2);

                    $continentCount = rand(0, 3);

                    $atmosphereId == 2 ? $life = 1 : $life = 0;

                    $atmosphereId == 2 ? $goldilocks = 1 : $goldilocks = 0;

                    $ring = 0;



                    break;

                case 18 :

                    $atmosphereId = 10;

                    $mass = rand(1400, 2800);

                    $density = rand(89, 100);

                    $moonCount = rand(0, 4);

                    $oceanCount = 0;

                    $continentCount = 0;

                    $life = 0;

                    $goldilocks = 0;

                    $ring = 0;


                    break;

                case 19 :

                    $atmosphereId = 1;

                    $mass = rand(60000, 120000);

                    $density = rand(89, 100);

                    $moonCount = rand(21, 48);

                    $oceanCount = 0;

                    $continentCount = 0;

                    $life = 0;

                    $goldilocks = 0;

                    $rings = [0, 1, 0, 0, 0, 0, 0];

                    $result = array_rand($rings);

                    $ring = $rings[$result];


                    break;

                case 20 :

                    $atmosphereId = 3;

                    $mass = rand(70, 300);

                    $density = rand(49, 100);

                    $moonCount = rand(0, 1);

                    $oceanCount = 0;

                    $continentCount = 1;

                    $life = 0;

                    $goldilocks = 0;

                    $ring = 0;

                    break;

                case 21 :

                    $result = array_rand($mesoChoices);

                    $atmosphereId = $mesoChoices[$result];

                    $mass = rand(70, 90);

                    $density = rand(70, 100);

                    $moonCount = 0;

                    $oceanCount = rand(0, 2);

                    $continentCount = rand(0, 5);

                    $atmosphereId == 2 ? $life = 1 : $life = 0;

                    $atmosphereId == 2 ? $goldilocks = 1 : $goldilocks = 0;

                    $ring = 0;

                    break;

                case 23 :

                    $atmosphereId = 10;

                    $mass = rand(300, 500);

                    $density = rand(89, 100);

                    $moonCount = rand(0, 2);

                    $oceanCount = 0;

                    $continentCount = 0;

                    $life = 0;

                    $goldilocks = 0;

                    $rings = [0, 1, 0, 0, 0, 0, 0];

                    $result = array_rand($rings);

                    $ring = $rings[$result];

                    break;

                case 24 :

                    $atmosphereId = 11;

                    $mass = rand(1000, 3000);

                    $density = rand(59, 100);

                    $moonCount = rand(0, 8);

                    $oceanCount = rand(1, 12);

                    $continentCount = rand(0, 10);

                    $life = rand(0, 1);

                    $goldilocks = 0;

                    $ring = 0;

                    break;

                case 25 :

                    $result = array_rand($choices);

                    $atmosphereId = $choices[$result];

                    $mass = rand(100, 300);

                    $density = rand(59, 100);

                    $moonCount = rand(0, 2);

                    $oceanCount = 0;

                    $continentCount = 1;

                    $life = 0;

                    $goldilocks = 0;

                    $ring = 0;

                    break;

                case 26 :

                    $atmosphereId = 1;

                    $mass = rand(30000, 60000);

                    $density = rand(89, 100);

                    $moonCount = rand(17, 29);

                    $oceanCount = 0;

                    $continentCount = 0;

                    $life = 0;

                    $goldilocks = 0;

                    $rings = [0, 1, 0, 0, 0, 0, 0];

                    $result = array_rand($rings);

                    $ring = $rings[$result];

                    break;

                case 27 :

                    $atmosphereId = 12;

                    $mass = rand(30000, 60000);

                    $density = rand(89, 100);

                    $moonCount = rand(15, 26);

                    $oceanCount = 0;

                    $continentCount = 0;

                    $life = 0;

                    $goldilocks = 0;

                    $rings = [0, 1, 0, 0, 0, 0, 0];

                    $result = array_rand($rings);

                    $ring = $rings[$result];

                    break;

                case 28 :

                    $atmosphereId = 1;

                    $mass = rand(300, 900);

                    $density = rand(89, 100);

                    $moonCount = rand(0, 2);

                    $oceanCount = 0;

                    $continentCount = 0;

                    $life = 0;

                    $goldilocks = 0;

                    $rings = [0, 1, 0, 0, 0, 0, 0];

                    $result = array_rand($rings);

                    $ring = $rings[$result];

                    break;

                case 29 :

                    $result = array_rand($mesoChoices);

                    $atmosphereId = $mesoChoices[$result];

                    $mass = rand(100, 200);

                    $density = rand(59, 100);

                    $moonCount = rand(0, 1);

                    $oceanCount = rand(0, 2);

                    $continentCount = rand(0, 5);

                    $atmosphereId == 2 ? $life = 1 : $life = 0;

                    $atmosphereId == 2 ? $goldilocks = 1 : $goldilocks = 0;

                    $ring = 0;

                    break;

                case 30 :

                    $result = array_rand($mesoChoices);

                    $atmosphereId = $mesoChoices[$result];

                    $mass = rand(90, 200);

                    $density = rand(39, 100);

                    $moonCount = rand(0, 2);

                    $oceanCount = 0;

                    $continentCount = 1;

                    $atmosphereId == 2 ? $life = 1 : $life = 0;

                    $atmosphereId == 2 ? $goldilocks = 1 : $goldilocks = 0;

                    $ring = 0;

                    break;


                case 32 :

                    $atmosphereId = 2;

                    $mass = rand(100, 200);

                    $density = rand(79, 100);

                    $moonCount = rand(0, 2);

                    $oceanCount = rand(0, 3);

                    $continentCount = rand(0, 5);

                    $life = 1;

                    $goldilocks = 1;

                    $ring = 0;

                    break;

                case 33 :

                    $atmosphereId = 3;

                    $mass = rand(90, 300);

                    $density = rand(59, 100);

                    $moonCount = rand(0, 2);

                    $oceanCount = 0;

                    $continentCount = 1;

                    $life = 0;

                    $goldilocks = 0;

                    $ring = 0;

                    break;


            }


            DB::table('planets')->insert([
                'name' => $value,
                'slug' => str_slug($value, "-"),
                'planet_type_id' => $planetType,
                'atmosphere_id' => $atmosphereId,
                'star_id' => rand(1, 1007),
                'planet_detail_id' => 0,
                'universe_id' => 1,
                'galaxy_id' => 3,
                'mass' => $mass,
                'atmospheric_density' => $density,
                'planet_number_from_star' => rand(1, 15),
                'moon_count' => $moonCount,
                'ocean_count' => $oceanCount,
                'continent_count' => $continentCount,
                'is_life_present' => $life,
                'is_in_goldilocks_zone' => $goldilocks,
                'is_ringed' => $ring,
                'coordinates' => rand(1,259),
                'is_active' => 1,
                'description' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }




    }
}
