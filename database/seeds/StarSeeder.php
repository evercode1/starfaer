<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Utilities\FetchInsideArrayFile;

class StarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('stars')->truncate();

        $types = [ 1 => 'A-type main-sequence star',
                   4 => 'B type main sequence',
                   5 => 'Barium star',
                   20 =>'Carbon star',
                   36 => 'Extreme helium star',
                   37 => 'F-type main-sequence star',
                   42 => 'G-type main-sequence star',
                   46 => 'Helium star',
                   52 =>'K-type main-sequence star',
                   63 => 'O-type main-sequence star',
                   86 => 'Red dwarf',
                   98 => 'Subdwarf O star',
                   106 => 'White dwarf',
                   107 => 'Wolf–Rayet star',
                   109  => 'Yellow giant'

        ];


        $file = base_path('seeds/star-seeds.php');

        $values = FetchInsideArrayFile::get($file);

        $size = 0;

        $age = 0;

        foreach( $values as $key => $value){

            $typeKey = (array_rand($types, 1));

            switch($typeKey){

                case 1 :

                   $size = 180;
                   $age = 1;
                    break;

                case 4 :

                    $size = 900;
                    $age = 8;
                    break;

                case 5 :

                    $size = 120;
                    $age = 9;
                    break;


                case 20 :

                    $size = 1100;
                    $age = 11;
                    break;

                case 25 :

                    $size = 60;
                    $age = 8;
                    break;

                case 36 :

                    $size = 1200;
                    $age = 6;
                    break;

                case 37 :

                    $size = 1200;
                    $age = 10;
                    break;

                case 42 :

                    $size = 100;
                    $age = 7;
                    break;

                case 46 :

                    $size = 2000;
                    $age = 5;
                    break;

                case 52 :

                    $size = 70;
                    $age = 9;
                    break;

                case 63 :

                    $size = 4000;
                    $age = 6;
                    break;

                case 86 :

                    $size = 60;
                    $age = 4;
                    break;

                case 98 :

                    $size = 50;
                    $age = 5;
                    break;

                case  106 :

                    $size = 100;
                    $age = 7;
                    break;

                case  107 :

                    $size = 100;
                    $age =6;
                    break;

                case 109 :

                    $size = 600;
                    $age = 8;
                    break;

                default:

                    $size = 100;
                    $age = 7;
                    break;


            }



            DB::table('stars')->insert([
                'name' => $value['name'],
                'slug' => str_slug($value['name'], "-"),
                'universe_id' => 1,
                'star_type_id' => $typeKey,
                'galaxy_id' => 3,
                'is_active' => 1,
                'is_binary' => 0,
                'is_featured' => 0,
                'has_planets' => 1,
                'constellation_id' => 0,
                'planet_count' => rand(6, 12),
                'age' => $age,
                'size' => $size,
                'zone_id' => rand(1, 100),
                'description' => $value['name'] . ' is'
                                                . $this->formatA($typeKey)
                                                . $types[$typeKey]
                                                . ' star that is '
                                                . $age
                                                . ' billion years old and '
                                                . $this->formatSize($size)
                                                . ' times the solar mass of our sun.',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

    }

    private function formatSize($size){

        return $size / 100;

    }

    private function formatA($type){

        $starTypes = [1, 36, 63];


        return in_array($type, $starTypes) ? ' an ' : ' a ';
    }
}
