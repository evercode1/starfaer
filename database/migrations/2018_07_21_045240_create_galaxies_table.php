<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalaxiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        Schema::create('galaxies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->unique();
            $table->unsignedInteger('galaxy_type_id');
            $table->string('slug', 100);
            $table->boolean('is_active')->default(1);
            $table->unsignedInteger('universe_id');
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

        Schema::dropIfExists('galaxies');

    }

}