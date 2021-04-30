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
            $table->string('title_ru')->nullable()->after('title_kz');
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
            $table->dropColumn(['title_kz', 'title_ru', 'price', 'is_free', 'is_demo']);
        });
    }
}
