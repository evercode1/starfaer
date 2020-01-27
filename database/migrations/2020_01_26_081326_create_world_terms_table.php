<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorldTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        Schema::create('world_terms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->unique();
            $table->string('slug', 100);
            $table->boolean('is_active')->default(1);
            $table->unsignedInteger('planet_id');
            $table->unsignedInteger('book_id');
            $table->unsignedInteger('world_term_type_id');
            $table->longText('description');
            $table->timestamps();

            $table->index('book_id');
            $table->index('planet_id');
            $table->index('world_term_type_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {

        Schema::dropIfExists('world_terms');

    }

}