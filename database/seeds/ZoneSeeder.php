<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Utilities\FetchInsideArrayFile;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('zones')->truncate();

        $file = base_path('seeds/zone-seeds.php');



        $values = FetchInsideArrayFile::getFirstColumnValues($file);


        foreach( $values as $key => $value){

            DB::table('zones')->insert([
                'name' => $value['name'],
                'slug' => str_slug($value['name'], "-"),
                'universe_id' => 1,
                'zone_type_id' => 1,
                'is_active' => 1,
                'is_featured' => 0,
                'description' => $value['description'],
                'coordinates' => $value['coordinates'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }


    }
}
