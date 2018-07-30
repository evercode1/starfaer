<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDescriptionToGalaxiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('galaxies', function ($table) {

            $table->longText('description')->after('is_active');
            $table->string('image_name')->unique()->nullable()->after('universe_id');
            $table->string('image_extension', 10)->nullable()->after('image_name');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('galaxies', function ($table) {

            $table->dropColumn('description');
            $table->dropColumn('image_name');
            $table->dropColumn('image_extension');


        });
    }
}
