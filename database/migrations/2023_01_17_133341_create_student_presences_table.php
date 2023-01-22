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
        Schema::create('student_presences', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id');
            $table->integer('s_vii_1');
            $table->integer('i_vii_1');
            $table->integer('tk_vii_1');
            $table->integer('s_vii_2');
            $table->integer('i_vii_2');
            $table->integer('tk_vii_2');
            $table->integer('s_viii_1');
            $table->integer('i_viii_1');
            $table->integer('tk_viii_1');
            $table->integer('s_viii_2');
            $table->integer('i_viii_2');
            $table->integer('tk_viii_2');
            $table->integer('s_ix_1');
            $table->integer('i_ix_1');
            $table->integer('tk_ix_1');
            $table->integer('s_ix_2');
            $table->integer('i_ix_2');
            $table->integer('tk_ix_2');
            $table->integer('total_sick');
            $table->integer('total_permission');
            $table->integer('total_alpha');
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
        Schema::dropIfExists('student_presences');
    }
};
