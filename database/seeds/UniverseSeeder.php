<?php

use Illuminate\Database\Seeder;
use App\Utilities\FetchInsideArrayFile;
use Illuminate\Support\Facades\DB;

class UniverseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('universes')->truncate();



        $file = base_path('seeds/universe-seeds.php');



        $values = FetchInsideArrayFile::getFirstColumnValues($file);


        foreach( $values as $key => $value){

            DB::table('universes')->insert([
                'name' => $value['name'],
                'slug' => str_slug($value['name'], "-"),
                'author' => $value['author'],
                'description' => $value['description'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
