<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id');
            $table->string('variant_kz')->nullable();
            $table->string('variant_ru')->nullable();
            $table->boolean('is_right');
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
        Schema::dropIfExists('question_variants');
    }
}
