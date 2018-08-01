<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->unique();
            $table->string('slug', 100);
            $table->boolean('is_active')->default(1);
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_binary')->default(0);
            $table->boolean('has planets')->default(0);
            $table->integer('planet_count')->nullable();
            $table->integer('age');
            $table->integer('size');
            $table->unsignedInteger('star_type_id');
            $table->unsignedInteger('zone_id');
            $table->unsignedInteger('universe_id');
            $table->unsignedInteger('galaxy_id');
            $table->unsignedInteger('constellation_id');
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
        Schema::dropIfExists('stars');
    }
}
