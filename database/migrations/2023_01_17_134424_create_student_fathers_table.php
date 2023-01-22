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
        Schema::create('student_fathers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('father_name', 191);
            $table->string('birth_place', 191);
            $table->date('birth_date');
            $table->string('education', 191);
            $table->string('religion', 191);
            $table->string('profession', 191);
            $table->string('income', 20);
            $table->string('whatsapp_phone_number', 20);
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
        Schema::dropIfExists('student_fathers');
    }
};
