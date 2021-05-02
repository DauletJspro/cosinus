<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttributesToVariants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('variants', function (Blueprint $table) {
            $table->integer('price')->after('school_id')->nullable();
            $table->tinyInteger('is_free')->nullable()->after('description_ru');
            $table->tinyInteger('is_demo')->nullable()->after('is_free');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('variants', function (Blueprint $table) {
            $table->dropColumn(['price', 'is_free', 'is_demo']);
        });
    }
}
