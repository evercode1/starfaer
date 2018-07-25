<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OldStarTypeSeeder extends Seeder
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
                'name' => $key,
                'slug' => $slug = str_slug($key, "-"),
                'universe_id' => 1,
                'is_active' => 1,
                'description' => $value,
                'created_at' => now(),
                'updated_at' => now()
            ]);

        }


    }
}
