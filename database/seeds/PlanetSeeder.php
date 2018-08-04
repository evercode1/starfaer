<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Utilities\FetchInsideArrayFile;

class PlanetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        dd('you need to configure the seeder file before this will work.');

        DB::table('planets')->truncate();



        $file = base_path('seeds/planets-seeds.php');



        $values = FetchInsideArrayFile::getFirstColumnValues($file);


        foreach( $values as $key => $value){

            DB::table('planets')->insert([
                'name' => $value['name'],
                'slug' => str_slug($value['name'], "-"),
                'universe_id' => 1,
                'galaxy_id' => 3,
                'is_active' => 1,
                'description' => $value['description'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }




    }
}
