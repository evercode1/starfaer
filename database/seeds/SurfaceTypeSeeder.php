<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Utilities\FetchInsideArrayFile;

class SurfaceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('surface_types')->truncate();



        $file = base_path('seeds/surface-type-seeds.php');



        $values = FetchInsideArrayFile::getFirstColumnValues($file);


        foreach( $values as $key => $value){

            DB::table('surface_types')->insert([
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
