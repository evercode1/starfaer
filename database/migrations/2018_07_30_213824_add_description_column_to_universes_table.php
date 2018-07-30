<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDescriptionColumnToUniversesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('universes', function ($table) {

            $table->longText('description')->after('author');
            $table->boolean('is_active')->default(1)->after('description');
            $table->string('image_name')->unique()->nullable()->after('is_active');
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
        Schema::table('universes', function ($table) {

            $table->dropColumn('description');
            $table->dropColumn('is_active');
            $table->dropColumn('image_name');
            $table->dropColumn('image_extension');


        });
    }
}
