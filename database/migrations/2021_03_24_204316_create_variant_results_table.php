<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariantResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variant_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')
                ->constrained('questions');
            $table->foreignId('user')
                ->constrained('users');
            $table->foreignId('test_id')
                ->constrained('tests');
            $table->foreignId('checked_variant_id')
                ->constrained('question_variants');
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
        Schema::dropIfExists('variant_results');
    }
}
