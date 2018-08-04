<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        Schema::create('planets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->unique();
            $table->string('slug', 100);
            $table->unsignedInteger('planet_type_id');
            $table->unsignedInteger('atmosphere_id');
            $table->unsignedInteger('star_id');
            $table->unsignedInteger('planet_detail_id');
            $table->unsignedInteger('universe_id');
            $table->unsignedInteger('galaxy_id');
            $table->integer('mass');
            $table->integer('atmospheric_density');
            $table->integer('planet_number_from_star');
            $table->integer('moon_count')->default(0);
            $table->integer('ocean_count')->default(0);
            $table->integer('continent_count')->default(0);
            $table->boolean('is_active')->default(1);
            $table->boolean('is_life_present')->default(0);
            $table->boolean('is_in_goldilocks_zone')->default(0);
            $table->boolean('is_ringed')->default(0);
            $table->string('coordinates');
            $table->longText('description');
            $table->string('image_name')->unique()->nullable();
            $table->string('image_extension', 10)->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {

        Schema::dropIfExists('planets');

    }

}