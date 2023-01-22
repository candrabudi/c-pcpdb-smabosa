<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_scores', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->integer('score_vii_1');
            $table->integer('score_vii_2');
            $table->integer('score_viii_1');
            $table->integer('score_viii_2');
            $table->integer('score_ix_1');
            $table->integer('score_ix_2');
            $table->integer('total_score');
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
        Schema::dropIfExists('student_scores');
    }
};
