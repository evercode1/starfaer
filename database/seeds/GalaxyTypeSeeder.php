<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Utilities\FetchInsideArrayFile;
class GalaxyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('galaxy_types')->truncate();



        $file = base_path('seeds/galaxy-type-seeds.php');



        $values = FetchInsideArrayFile::getFirstColumnValues($file);


        foreach( $values as $key => $value){

            DB::table('galaxy_types')->insert([
                'name' => $value['name'],
                'slug' => str_slug($value['name'], "-"),
                'universe_id' => 1,
                'is_active' => 1,
                'is_featured' => 1,
                'weight' => 100,
                'description' => $value['description'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
