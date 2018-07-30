<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Utilities\FetchInsideArrayFile;

class GalaxySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('galaxies')->truncate();



        $file = base_path('seeds/galaxy-seeds.php');



        $values = FetchInsideArrayFile::getFirstColumnValues($file);


        foreach( $values as $value){

            DB::table('galaxies')->insert([
                'name' => $value,
                'slug' => str_slug($value, "-"),
                'universe_id' => 1,
                'galaxy_type_id' => 1,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
