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

                   $size = rand(180, 220);
                   $age = rand(1, 2);
                    break;

                case 4 :

                    $size = rand(900, 1100);
                    $age = rand(6,9);
                    break;

                case 5 :

                    $size = rand(120, 140);
                    $age = rand(7,10);
                    break;


                case 20 :

                    $size = rand(1100, 2200);
                    $age = rand(8,11);
                    break;

                case 25 :

                    $size = rand(60, 75);
                    $age = rand(5,8);
                    break;

                case 36 :

                    $size = rand(1200, 1500);
                    $age = rand(4, 7);
                    break;

                case 37 :

                    $size = rand(1200, 1600);
                    $age = rand(7, 11);
                    break;

                case 42 :

                    $size = rand(90, 120);
                    $age = rand(5, 9);
                    break;

                case 46 :

                    $size = rand(2000, 2400);
                    $age = rand(4, 6);
                    break;

                case 52 :

                    $size = rand(45, 70);
                    $age = rand(7, 10);
                    break;

                case 63 :

                    $size = rand(4000, 6000);
                    $age = rand(4, 8);
                    break;

                case 86 :

                    $size = rand(60, 70);
                    $age = rand(4, 6);
                    break;

                case 98 :

                    $size = rand(50, 60);
                    $age = rand(4, 7);
                    break;

                case  106 :

                    $size = rand(90, 100);
                    $age = rand( 5, 9);
                    break;

                case  107 :

                    $size = rand(90, 100);
                    $age = rand(4, 8);
                    break;

                case 109 :

                    $size = rand(600, 800);
                    $age = rand(7, 10);
                    break;

                default:

                    $size = rand(90, 110);
                    $age = rand(5,9);
                    break;


            }



            DB::table('stars')->insert([
                'name' => $value,
                'slug' => str_slug($value, "-"),
                'universe_id' => 1,
                'star_type_id' => $typeKey,
                'galaxy_id' => 3,
                'is_active' => 1,
                'is_binary' => 0,
                'is_featured' => 0,
                'has_planets' => 1,
                'coordinates' => 0,
                'planet_count' => rand(6, 12),
                'age' => $age,
                'size' => $size,
                'zone_id' => rand(1, 100),
                'description' => ucwords($value) . ' is'
                                                . $this->formatA($typeKey)
                                                . $types[$typeKey]
                                                . ' that is '
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
