<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorldTermTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        Schema::create('world_term_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->unique();
            $table->boolean('is_active')->default(1);
            $table->longText('description');
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

        Schema::dropIfExists('world_term_types');

    }

}