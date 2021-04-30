<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionToSchools extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schools', function (Blueprint $table) {
            $table->string('description_kz')->after('name_ru')->nullable();
            $table->string('description_ru')->after('description_kz')->nullable();
            $table->integer('phone')->after('description_ru')->nullable();
            $table->string('email')->after('phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schools', function (Blueprint $table) {
            $table->dropColumn(['description_kz', 'description_ru', 'phone', 'email']);
        });
    }
}
