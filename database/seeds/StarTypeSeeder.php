<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StarTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('star_types')->truncate();

        $values = config('star-type-seed.startypes');


        foreach($values as $key => $value){

            DB::table('star_types')->insert([
                'name' => $value['name'],
                'slug' => $slug = str_slug($value['name'], "-"),
                'universe_id' => 1,
                'is_active' => 1,
                'description' => $value['description'],
                'wiki_url' => $value['wiki'],
                'created_at' => now(),
                'updated_at' => now()
            ]);

        }


    }
}
